<template>
    <div class="card p-3 mb-4">
        <div class="input-group">
            <input
                v-model="term"
                @keyup.enter="onSearch"
                class="form-control"
                placeholder="Digite o título ou autor">
            <button class="btn btn-primary" @click="onSearch">
                Buscar
            </button>
        </div>
    </div>
</template>

<script lang="ts" src="./search-book.component.ts"></script>