<template>
  <div class="container">
    <div class="select-container">
      Выводить по
      <select
          class="form-select"
          aria-label="Выводить по"
          v-model="limit"
          @change="fetchItems"
      >
        <option value="5">5</option>
        <option value="10">10</option>
      </select>
    </div>
    <table class="table">
      <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Наименование</th>
        <th scope="col">Цена</th>
        <th scope="col">Количество</th>
      </tr>
      </thead>
      <tbody>
      <tr v-for="item in items" :key="item.id">
        <td>{{ item.id }}</td>
        <td>{{ item.title }}</td>
        <td>{{ item.price }}</td>
        <td>{{ item.quantity }}</td>
      </tr>
      </tbody>
    </table>

    <div class="buttons-container">
      <button
          type="button"
          class="btn btn-outline-primary"
          :disabled="!items || page === 1"
          @click="changePage(-1)"
      >
        Назад
      </button>
      <button
          type="button"
          class="btn btn-outline-primary"
          :disabled="!items || page === items.length"
          @click="changePage(1)"
      >
        Вперед
      </button>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      items: [],
      limit: 5,
      page: 1
    };
  },
  methods: {
    async fetchItems() {

      const response = await axios.get(`http://localhost/api.php?page=${this.page}&limit=${this.limit}`);
      this.items = response.data;
    },
    changePage(direction) {
      this.page += direction;
      this.fetchItems();
    }
  },
  mounted() {
    this.fetchItems();
  }
};
</script>

<style lang="scss">
  .container {
    display: flex;
    flex-direction: column;
    gap: 10px;
    padding-top: 10px;

    .select-container {
      display: flex;
      flex: auto;
      width: 200px;
      align-self: end;
      flex-direction: column;
      gap: 5px;
    }

    .buttons-container {
      display: flex;

      button {
        &:nth-child(1) {
          border-top-right-radius: 0;
          border-bottom-right-radius: 0;
        }
        &:nth-last-child(1) {
          border-top-left-radius: 0;
          border-bottom-left-radius: 0;
        }
      }
    }
  }
</style>