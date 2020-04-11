<template>
  <div class="row mt-2">
    <div class="col-12" @mouseover="hover=true" @mouseleave="hover=false">
      <div class="card text-white bg-primary">
        <div class="card-header">Обратная связь</div>
        <div class="card-body" v-if="hover">
            <div class="md-form form-group mt-1">
                <input type="text" class="form-control" id="formContactName">
                <label for="formContactName">Ваше имя</label>
            </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  mounted() {
    console.log("Component mounted.");
  },
  data() {
      return {
        hover: false,
      }
  }
};
</script>