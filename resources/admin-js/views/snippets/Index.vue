<template>
    <div class="container">
        <h1 class="display-5 mb-4">Snippets</h1>
        <nav class="nav">
          <router-link class="nav-link" :to="{name:'snippets'}">All</router-link>
          <router-link class="nav-link" :to="{name:'new-snippet'}">Create</router-link>
        </nav>
        <hr>
        <router-view></router-view>
    </div>
</template>