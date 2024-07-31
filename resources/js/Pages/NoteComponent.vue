<template>
    <div>
      <h1>{{ $t('notes') }}</h1>
      <ul>
        <li v-for="note in notes" :key="note.id">
          {{ note.title }}
        </li>
      </ul>
    </div>
  </template>

  <script>
  import axios from 'axios';

  export default {
    data() {
      return {
        notes: []
      };
    },
    created() {
      axios.get('http://your-laravel-app-url/api/notes')
        .then(response => {
          this.notes = response.data;
        });
    }
  };
  </script>
