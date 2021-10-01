<template>
    <div class="container">
        <h1 class="display-5 mb-4">Files</h1>
        <nav class="nav">
          <router-link class="nav-link" :to="{name:'files'}">All</router-link>
          <router-link class="nav-link" :to="{name:'new-file'}">Upload</router-link>
        </nav>
        <hr>
        <router-view></router-view>
    </div>
</template>