<template>
    <div class="container">
        <h1 class="display-5 mb-4">Links</h1>
        <nav class="nav">
          <router-link class="nav-link" :to="{name:'links'}">All</router-link>
          <router-link class="nav-link" :to="{name:'new-link'}">Create</router-link>
        </nav>
        <hr>
        <router-view></router-view>
    </div>
</template>