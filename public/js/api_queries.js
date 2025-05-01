/**
 * Gerenciador de Formulários - Versão melhorada
 * Responsável por validação, submissão e feedback de formulários
 */

// Configurações Globais
const CONFIG = {
    // Duração padrão para mensagens de toast/alerta (em ms)
    messageDuration: 2000,
    // Texto padrão para campos obrigatórios
    requiredFieldMessage: "Este campo é obrigatório",
};

/**
 * Inicializa os event listeners para todos os botões de submissão
 */
function initFormHandlers() {
    // Mapeamento de botões para formulários e endpoints
    const formMappings = [
        {
            selector: "#registrar_utilizador",
            formId: "form_registrar_utilizador",
            endpoint: "utilizadores/add",
        },
        {
            selector: "#editar_utilizador",
            formId: "form_editar_utilizador",
            endpoint: "utilizadores/edit",
        },
        {
            selector: "#registrar_tipo_utilizador",
            formId: "form_registrar_tipo_utilizador",
            endpoint: "tipo_utilizador/add",
        },
        {
            selector: "#editar_tipo_utilizador",
            formId: "form_actualizar_tipo_utilizador",
            endpoint: "tipo_utilizador/edit",
        },

    ];

    // Adiciona os event listeners para cada mapeamento
    formMappings.forEach((mapping) => {
        $(document).on("click", mapping.selector, function (e) {
            handleFormSubmission(e, mapping.formId, mapping.endpoint);
        });
    });

    // Adiciona validação em tempo real para todos os formulários
    setupLiveValidation();
}

/**
 * Configura validação em tempo real para campos de formulário
 */
function setupLiveValidation() {
    $(document).on(
        "blur change",
        "form input, form select, form textarea",
        function () {
            validateField(this);
        }
    );
}

/**
 * Valida um campo individual e exibe feedback
 * @param {HTMLElement} field - O campo a ser validado
 * @returns {boolean} - Se o campo é válido
 */
function validateField(field) {
    const $field = $(field);
    const isRequired = $field.prop("required");
    const isEmpty = !$field.val() || $field.val().trim().length === 0;

    // Remover feedback anterior
    $field.removeClass("is-valid is-invalid");
    let feedbackElement = $field.siblings(".invalid-feedback");

    // Se não existe elemento de feedback, cria um
    if (feedbackElement.length === 0) {
        feedbackElement = $("<div>").addClass("invalid-feedback");
        $field.after(feedbackElement);
    }

    // Validar campo
    if (isRequired && isEmpty) {
        $field.addClass("is-invalid");
        feedbackElement.text(CONFIG.requiredFieldMessage);
        return false;
    } else if ($field.val()) {
        $field.addClass("is-valid");
        return true;
    }

    return true;
}

/**
 * Valida todos os campos do formulário
 * @param {string} formId - ID do formulário
 * @returns {boolean} - Se o formulário é válido
 */
function validateForm(formId) {
    let isValid = true;
    const $form = $(`#${formId}`);

    $form.find("input, select, textarea").each(function () {
        if (!validateField(this)) {
            isValid = false;
        }
    });

    return isValid;
}

/**
 * Gerencia a submissão de formulário, validação e feedback
 * @param {Event} e - Evento de clique
 * @param {string} formId - ID do formulário
 * @param {string} endpoint - Endpoint da API
 */
async function handleFormSubmission(e, formId, endpoint) {
    e.preventDefault();

    // Valida o formulário - sem mensagem global de erro
    const isValid = validateForm(formId);

    if (!isValid) {
        // Focamos o primeiro campo inválido em vez de mostrar um alerta
        $(`#${formId} .is-invalid`).first().focus();
        hideLoader();
        return;
    }

    try {
        // Submete o formulário
        const response = await submitFormData(formId, endpoint);

        // Processa a resposta
        if (response.success) {
            await showSuccessMessage(
                response.message || "Operação concluída com sucesso!"
            );

            // Ações específicas pós-submissão
            handlePostSubmissionActions(formId, response);
        } else {
            // Exibe mensagem de erro
            Swal.fire({
                icon: "warning",
                title: response.message || "Ocorreu um erro na operação",
                showConfirmButton: true,
            });
        }
    } catch (error) {
        console.error("Erro ao processar formulário:", error);
        Swal.fire({
            icon: "error",
            title: "Erro na operação",
            text: "Ocorreu um erro ao processar sua solicitação.",
            showConfirmButton: true,
        });
    } finally {
        hideLoader();
    }
}

/**
 * Exibe mensagem de sucesso
 * @param {string} message - Mensagem de sucesso
 * @returns {Promise} - Promessa que resolve após a exibição da mensagem
 */
async function showSuccessMessage(message) {
    return Swal.fire({
        icon: "success",
        title: message,
        showConfirmButton: false,
        timer: CONFIG.messageDuration,
    });
}

/**
 * Gerencia ações específicas após a submissão bem-sucedida do formulário
 * @param {string} formId - ID do formulário
 * @param {object} response - Resposta da API
 */
function handlePostSubmissionActions(formId, response) {
    // Mapeamento de formulários para ações pós-submissão
    const postSubmissionActions = {
        form_registrar_provincia: () => {
            $("#rg-provincia").modal("hide");
            window.location.reload();
        },
        form_editar_provincia: () => {
            $("#edit-provincia").modal("hide");
            window.location.reload();
        },
        form_registrar_distrito: () => {
            $("#rg-distrito").modal("hide");
            window.location.reload();
        },
        form_registrar_vaga: () => {
            $("#rg_vaga").modal("hide");
            window.location.reload();
        },
        form_funcionario_update: () => {
            location.assign("listagem_funcionarios.php");
        },
        // Ação padrão - recarregar a página
        default: () => {
            window.location.reload();
        },
    };

    // Executa a ação específica ou a ação padrão
    const action =
        postSubmissionActions[formId] || postSubmissionActions.default;
    action();
}

/**
 * Submete os dados do formulário para o endpoint especificado
 * @param {string} formId - ID do formulário
 * @param {string} endpoint - Endpoint da API
 * @returns {Promise<object>} - Promessa que resolve com a resposta da API
 */
async function submitFormData(formId, endpoint) {
    const form = document.getElementById(formId);
    const formData = new FormData(form);

    try {
        showLoader();

        const response = await fetch(endpoint, {
            method: "POST",
            body: formData,
        });

        if (!response.ok) {
            return {
                success: false,
                message: `Erro ${response.status}: ${response.statusText}`,
            };
        }

        return await response.json();
    } catch (error) {
        console.error("Erro na submissão:", error);
        return {
            success: false,
            message: "Ocorreu um erro na comunicação com o servidor",
            error: true,
        };
    }
}

/**
 * Limpa todos os campos de um formulário
 * @param {string} formId - ID do formulário
 */
function resetForm(formId) {
    const form = document.getElementById(formId);
    if (!form) return;

    // Limpa valores
    form.reset();

    // Remove classes de validação
    $(form).find("input, select, textarea").removeClass("is-valid is-invalid");

    // Reinicia selects avançados (Select2, etc.)
    $(form)
        .find("select")
        .each(function () {
            if ($(this).data("select2")) {
                $(this).val(null).trigger("change");
            }
        });
}

// Inicializa os gerenciadores de formulário quando o documento estiver pronto
$(document).ready(function () {
    initFormHandlers();
});
