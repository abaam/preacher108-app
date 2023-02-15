<template>
    <section class="content">
      <div class="container-fluid">
          <div class="row">
  
            <div class="col-12">
          
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Your Events as Teacher</h3>
  
                  <div class="card-tools">
                    
                    <button type="button" class="btn btn-sm btn-primary" @click="newModal">
                        <i class="fa fa-plus-square"></i>
                        Add New
                    </button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Student Name</th>
                        <th>Description</th>
                        <th>Date</th>
                        <th>Time Start</th>
                        <th>Time End</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                       <tr v-for="event in events.data" :key="event.id">
  
                        <td>{{event.id}}</td>
                        <td>{{event.student_id}}</td>
                        <td>{{event.description | truncate(30, '...')}}</td>
                        <td>{{event.event_date}}</td>
                        <td>{{event.even_start}}</td>
                        
                        <td>{{event.event_end }}</td>
                        <td>
                          
                          <a href="#" @click="editModal(student)">
                              <i class="fa fa-edit blue"></i>
                          </a>
                          /
                          <a href="#" @click="deleteProduct(event.id)">
                              <i class="fa fa-trash red"></i>
                          </a>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <pagination :data="events" @pagination-change-page="getResults"></pagination>
                </div>
              </div>
              <!-- /.card -->
            </div>
          </div>
  
          <!-- Modal -->
          <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNew" aria-hidden="true">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" v-show="!editmode">Create New Student</h5>
                      <h5 class="modal-title" v-show="editmode">Edit Product</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
  
                  <form @submit.prevent="editmode ? updateProduct() : createProduct()">
                      <div class="modal-body">
                          <div class="form-group">
                              <label>Name</label>
                              <input v-model="form.name" type="text" name="name"
                                  class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                              <has-error :form="form" field="name"></has-error>
                          </div>
                          <div class="form-group">
                              <label>Description</label>
                              <input v-model="form.description" type="text" name="description"
                                  class="form-control" :class="{ 'is-invalid': form.errors.has('description') }">
                              <has-error :form="form" field="description"></has-error>
                          </div>
                          <div class="form-group">
                              <label>Address</label>
                              <input v-model="form.address" type="text" name="address"
                                  class="form-control" :class="{ 'is-invalid': form.errors.has('address') }">
                              <has-error :form="form" field="address"></has-error>
                          </div>
                          <div class="form-group">
  
                              <label>Category</label>
                              <select class="form-control" v-model="form.category_id">
                                <option 
                                    v-for="(cat,index) in categories" :key="index"
                                    :value="index"
                                    :selected="index == form.category_id">{{ cat }}</option>
                              </select>
                              <has-error :form="form" field="category_id"></has-error>
                          </div>
                          <div class="form-group">
                              <label>Tags</label>
                              <vue-tags-input
                                v-model="form.tag"
                                :tags="form.tags"
                                :autocomplete-items="filteredItems"
                                @tags-changed="newTags => form.tags = newTags"
                              />
                              <has-error :form="form" field="tags"></has-error>
                          </div>
                          <div class="form-group">
                              <label>Teacher</label>
                              <select class="form-control" v-model="form.user_id">
                                <option 
                                    v-for="(uname,index) in users" :key="index"
                                    :value="uname.id"
                                    :selected="uname.id == form.user_id">{{ uname.name }}</option>
                              </select>
                              <has-error :form="form" field="user_id"></has-error>
                          </div>
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button v-show="editmode" type="submit" class="btn btn-success">Update</button>
                          <button v-show="!editmode" type="submit" class="btn btn-primary">Create</button>
                      </div>
                    </form>
                  </div>
              </div>
          </div>
      </div>
    </section>
  </template>
  
  <script>
      import VueTagsInput from '@johmun/vue-tags-input';
  
      export default {
        components: {
            VueTagsInput,
          },
          data () {
              return {
                  editmode: false,
                  events : {},
                  form: new Form({
                      id : '',
                      description: '',
                      note:  '',
                      student_id: '',
                      user_id:'',
                      start_event: '',
                      end_event: '',
                  }),
                  categories: [],
                  users:[],
                  students:  [],
                  autocompleteItems: [],
              }
          },
          methods: {
  
            getResults(page = 1) {
  
                this.$Progress.start();
                
                axios.get('/api/event?page=' + page).then(({ data }) => (this.events = data.data));
  
                this.$Progress.finish();
            },
            loadEvents(){
              // if(this.$gate.isAdmin()){
                axios.get("/api/event").then(({ data }) => (this.events = data.data));
              // }
            },
            loadCategories(){
                axios.get("/api/category/list").then(({ data }) => (this.categories = data.data));
            },
            loadUsers(){
                axios.get("/api/user/list").then(({ data }) => (this.users = data.data));
            },
            loadStudents(){
              axios.get("/api/event/studentList").then(({ data }) => (this.students = data.data));
            },
            editModal(student){
                this.editmode = true;
                this.form.reset();
                $('#addNew').modal('show');
                this.form.fill(student);
            },
            newModal(){
                this.editmode = false;
                this.form.reset();
                $('#addNew').modal('show');
            },
            createProduct(){
                this.$Progress.start();
  
                this.form.post('api/student')
                .then((data)=>{
                  if(data.data.success){
                    $('#addNew').modal('hide');
  
                    Toast.fire({
                          icon: 'success',
                          title: data.data.message
                      });
                    this.$Progress.finish();
                    this.loadEvents();
  
                  } else {
                    Toast.fire({
                        icon: 'error',
                        title: 'Some error occured! Please try again'
                    });
  
                    this.$Progress.failed();
                  }
                })
                .catch(()=>{
  
                    Toast.fire({
                        icon: 'error',
                        title: 'Some error occured! Please try again'
                    });
                })
            },
            updateProduct(){
                this.$Progress.start();
                this.form.put('api/student/'+this.form.id)
                .then((response) => {
                    // success
                    $('#addNew').modal('hide');
                    Toast.fire({
                      icon: 'success',
                      title: response.data.message
                    });
                    this.$Progress.finish();
                        //  Fire.$emit('AfterCreate');
  
                    this.loadEvents();
                })
                .catch(() => {
                    this.$Progress.fail();
                });
  
            },
            deleteProduct(id){
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
  
                        // Send request to the server
                          if (result.value) {
                                this.form.delete('api/student/'+id).then(()=>{
                                        Swal.fire(
                                        'Deleted!',
                                        'Your file has been deleted.',
                                        'success'
                                        );
                                    // Fire.$emit('AfterCreate');
                                    this.loadEvents();
                                }).catch((data)=> {
                                    Swal.fire("Failed!", data.message, "warning");
                                });
                          }
                    })
            },
  
          },
          mounted() {
              
          },
          created() {
              this.$Progress.start();
  
              this.loadEvents();
              this.loadCategories();
              this.loadUsers();
              this.loadStudents();
              this.$Progress.finish();
          },
          filters: {
              truncate: function (text, length, suffix) {
                  return text.substring(0, length) + suffix;
              },
          },
          computed: {
            filteredItems() {
              return this.autocompleteItems.filter(i => {
                return i.text.toLowerCase().indexOf(this.tag.toLowerCase()) !== -1;
              });
            },
          },
      }
  </script>
  