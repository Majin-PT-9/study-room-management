<template>
    <li className="container">
        <button @click="$emit('remove', id)" class="btn btn-danger"><i class="fa-solid fa-x"></i></button>
        {{ name }}
    </li>
</template>

<script>
export default {
    props: {
        name: String,
        id: Number, 
    },
    mounted() {
    },
    methods: {

    }
}
</script>
