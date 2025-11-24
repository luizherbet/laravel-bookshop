<template>
    <div class="card" style="width: 18rem; border: 2px solid blue; margin: 10px;">
        <div class="card-body">
            <h5 class="card-title" style="color: red;">{{ book ? book.title : 'SEM TÍTULO' }}</h5>
            <p class="card-text">Autor: {{ book ? book.author : 'SEM AUTOR' }}</p>
            <p class="card-text">Preço: {{ book && book.price ? `R$ ${book.price}` : 'R$ 0,00' }}</p>
            <a href="#" class="btn btn-primary">Adicionar ao carrinho</a>
        </div>
    </div>
</template>

<script lang="ts" src="./show-book.component.ts"></script>