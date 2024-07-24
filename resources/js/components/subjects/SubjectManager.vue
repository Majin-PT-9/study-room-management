<template>
    <div>
        <form @submit.prevent="addSubject">
            <div class="input-group mb-3 w-50">
                <input class="form-control" v-model="newSubjectName" type="text" placeholder="Subject name">
                <button class="btn btn-outline-success" style="border-style: none" type="submit"><i class="fa-solid fa-check"></i></button>
            </div>
        </form>
        <ul>
            <subject-item v-for="subject in subjects" :name="subject.name" :id="subject.id" :key="subject.id" @remove="removeSubject"></subject-item>
        </ul>
    </div>
</template>

<style scoped>
ul {
    padding-left: 0;
    list-style: none;
}
</style>

<script>
import SubjectItem from './SubjectItem.vue';

export default {
    components: {
        SubjectItem
    },
    props: {
        initialSubjects: {
            type: Array,
            required: true
        }
    },
    data() {
        return {
            newSubjectName: '',
            subjects: this.initialSubjects // Inicializa com os dados passados do Laravel
        };
    },
    mounted() {
        console.log(this.initialSubjects); // Isso deve mostrar a lista de disciplinas no console do navegador
        console.log(document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
    },
    methods: {
        addSubject() {
            // Verifica se o nome da disciplina não está vazio
            if (this.newSubjectName.trim() === '') {
                alert('O nome da disciplina não pode estar vazio.');
                return;
            }

            axios.post('/subjects/store', { name: this.newSubjectName }, {
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => {
                // A resposta do backend deve incluir a disciplina criada, incluindo seu novo ID
                this.subjects.push(response.data);
                this.newSubjectName = ''; // Limpa o campo de entrada após o sucesso
            })
            .catch(error => {
                console.error("Erro ao adicionar disciplina", error);
                alert('Houve um erro ao adicionar a disciplina. Verifique o console para mais detalhes.');
            });
        },
        removeSubject(id) {
            axios.delete(`/subjects/delete/${id}`, {
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            }).then(response => {
                    console.log(response);
                    this.subjects = this.subjects.filter(subject => subject.id !== id);
                    alert('Disciplina removida com sucesso.');
                })
                .catch(error => {
                    console.log(error);

                    console.error("Erro ao remover disciplina", error);
                    alert('Houve um erro ao remover a disciplina. Por favor, tente novamente.');
                });
        }
    }
};
</script>
