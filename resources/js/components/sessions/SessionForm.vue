<template>
    <div class="modal fade" id="sessionForm" tabindex="-1" aria-labelledby="sessionFormLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="sessionFormLabel">Criar nova sessão</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form @submit.prevent="submitForm">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="title" class="form-label">Titulo <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="title" v-model="form.title" required>
                        </div>
                        <div class="mb-3">
                            <label for="summary" class="form-label">Sumário</label>
                            <textarea class="form-control" id="summary" v-model="form.summary"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="day" class="form-label">Dia <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" id="day" v-model="form.day" required>
                        </div>
                        <div class="mb-3">
                            <label for="starts_at" class="form-label">Começa em (horas)<span class="text-danger">*</span></label>
                            <input type="time" class="form-control" id="starts_at" v-model="form.starts_at" step="300" required>                        </div>
                        <div class="mb-3">
                            <label for="ends_at" class="form-label">Termina em (horas)</label>
                            <input type="time" class="form-control" id="ends_at" v-model="form.ends_at" step="300">
                        </div>
                        <div class="mb-3">
                            <label for="subject_id" class="form-label">Disciplina <span class="text-danger">*</span></label>
                            <select class="form-select" id="subject_id" v-model="form.subject_id" required>
                                <option disabled value="">Selecione uma disciplina</option>
                                <option v-for="subject in subjects" :key="subject.id" :value="subject.id">
                                    {{ subject.name }}
                                </option>
                            </select>
                        </div>
                        <div v-if="!isTeacher">
                            <label for="teacher_id" class="form-label">Professor <span class="text-danger">*</span></label>
                            <select class="form-select" id="teacher_id" v-model="form.teacher_id" required>
                                <option value="" disabled>Selecionar professor</option>
                                <option v-for="teacher in teachers" :key="teacher.id" :value="teacher.id">{{ teacher.name }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary">Gravar Sessão</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['isTeacher', 'teachers', 'subjects'],

    data() {
        return {
            form: {
                title: '',
                summary: '',
                starts_at: '',
                ends_at: '',
                subject_id: '',
                day: '',
                teacher_id: ''  // Initialize if needed, otherwise it could be undefined

            }
        };
    },
    methods: {
        submitForm() {
            console.log(this.form)
            // Example with Axios (make sure to install and import Axios)
            axios.post('/sessions/store', this.form)
                .then(response => {
                    window.location.reload(); // Reload the page to see new data
                })
                .catch(error => {
                    if (error.response && error.response.status === 422) {
                        // Display validation errors
                        console.log(error.response.data.errors);
                        alert('Please correct the errors in the form.');
                    } else {
                        console.error('Server error:', error);
                    }
                });
        }
    }
}
</script>
