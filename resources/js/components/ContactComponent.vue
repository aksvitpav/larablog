<template>
  <div class="row mt-2">
    <div class="col-12" @mouseover="hover=true">
      <div class="card">
        <div class="card-header text-white bg-primary">Обратная связь</div>
        <div class="card-body" v-if="hover">
          <form action="#" @submit.prevent="submit" method="GET">
            <div class="md-form form-group mt-1">
              <input type="text" class="form-control" id="formContactName" name="name" v-model="fields.name" required />
              <label for="formContactName">Имя</label>
            </div>
            <div class="md-form form-group mt-1">
              <input type="email" class="form-control" id="formContactEmail" name="email" v-model="fields.email" required />
              <label for="formContactEmail">E-mail</label>
            </div>
            <div class="md-form mt-4">
              <textarea id="formContactText" class="md-textarea form-control" rows="3" name="text" v-model="fields.text" required></textarea>
              <label for="formContactText">Сообщение</label>
            </div>
            <button type="submit" class="btn btn-sm btn-primary btn-block mb-1">Отправить</button>
            <a class="btn btn-sm btn-primary btn-block" @click="cancel">Отмена</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import 'axios';
export default {
  mounted() {
    console.log("Component Contact mounted.");
  },
  data() {
    return {
      action:'/contact',
      hover: false,
      fields: {},
    };
  },
  methods: {
        submit() {
            axios.post(this.action, this.fields).then(response => {
                this.fields = {};
                this.hover = false;
            })
        },
        cancel() {
            this.fields = {};
            this.hover = false;
        }
  }
};
</script>