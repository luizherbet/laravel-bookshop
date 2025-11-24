<template>
    <div>
        <h1 class="text-center">Bem-vindo (a)</h1>
        <hr>
        <search-book @search-books="handleSearch"/>
        <!-- Loading -->
        <div v-if="isLoading" class="text-center">
            <div class="spinner-border" role="status">
                <span class="visually-hidden">Carregando...</span>
            </div>
        </div>

        <!-- Erro -->
        <div v-if="error" class="alert alert-danger" role="alert">
            {{ error }}
        </div>

        <!-- Lista de livros -->
        <div v-if="!isLoading && !error" class="container overflow-hidden">
            <!-- Mensagem quando não há livros -->
            <div v-if="books.length === 0" class="text-center mt-5">
                <p class="text-muted">Nenhum livro disponível no momento.</p>
            </div>

            <div class="row g-4">
                <div v-for="book in books" :key="book.id" class="col-md-3 col-sm-6">
                    <show-book :book="book"/>
                </div>
            </div>       
        </div>
    </div>
</template>

<script lang="ts" src="./home.component.ts"></script>