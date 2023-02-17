<template>
  <section class="content">
      <div class="container-fluid">
          <div class="row " >
              <div class="col-12 col-sm-6 col-md-3">
                  <div class="info-box">
                      <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

                      <div class="info-box-content">
                          <span class="info-box-text">Name</span>
                          <span class="info-box-number">
                            {{students.name}}
                          <small></small>
                          </span>
                      </div>
                      <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
              </div>
              <!-- /.col -->
              <div class="col-12 col-sm-6 col-md-3">
                  <div class="info-box mb-3">
                      <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

                      <div class="info-box-content">
                          <span class="info-box-text">Phone Number</span>
                          <span class="info-box-number">{{students.phone}}</span>
                      </div>
                      <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
              </div>
              <!-- /.col -->

              <!-- fix for small devices only -->
              <div class="clearfix hidden-md-up"></div>

              <div class="col-12 col-sm-6 col-md-3">
                  <div class="info-box mb-3">
                      <span class="info-box-icon bg-success elevation-1"><i class="fas fa-calendar"></i></span>

                      <div class="info-box-content">
                          <span class="info-box-text">Address</span>
                          <span class="info-box-number">{{students.address}}</span>
                      </div>
                      <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
              </div>
              <!-- /.col -->
              <div class="col-12 col-sm-6 col-md-3">
                  <div class="info-box mb-3">
                      <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                      <div class="info-box-content">
                          <span class="info-box-text">Facebook Link</span>
                          <span class="info-box-text">{{students.fb_link}}</span>
                      </div>
                  <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
              </div>
          <!-- /.col -->
          </div>
          <!-- /.row -->

          <div class="row">
              <!-- Left col -->
              <div class="col-md-8">
                  <!-- MAP & BOX PANE -->
                  <div class="card">
                  <div class="card-header">
                      <h3 class="card-title">Current Events</h3>

                      <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                          <i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove">
                          <i class="fas fa-times"></i>
                      </button>
                      </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                      <div class="table-responsive">
                      <table class="table m-0">
                          <thead>
                              <tr>
                                  <th>Event ID</th>
                                  <th>Teacher</th>
                                  <th>Student</th>
                                  <th>Class</th>
                              </tr>
                          </thead>
                          <tbody>
                              <tr>
                                  <td><a href="pages/examples/invoice.html">OR9842</a></td>
                                  <td>Call of Duty IV</td>
                                  <td><span class="badge badge-success">Shipped</span></td>
                                  <td>
                                      <div class="sparkbar" data-color="#00a65a" data-height="20">90,80,90,-70,61,-83,63</div>
                                  </td>
                              </tr>
                              <tr>
                                  <td><a href="pages/examples/invoice.html">OR1848</a></td>
                                  <td>Samsung Smart TV</td>
                                  <td><span class="badge badge-warning">Pending</span></td>
                                  <td>
                                      <div class="sparkbar" data-color="#f39c12" data-height="20">90,80,-90,70,61,-83,68</div>
                                  </td>
                              </tr>
                              <tr>
                                  <td><a href="pages/examples/invoice.html">OR7429</a></td>
                                  <td>iPhone 6 Plus</td>
                                  <td><span class="badge badge-danger">Delivered</span></td>
                                  <td>
                                      <div class="sparkbar" data-color="#f56954" data-height="20">90,-80,90,70,-61,83,63</div>
                                  </td>
                              </tr>
                              <tr>
                                  <td><a href="pages/examples/invoice.html">OR7429</a></td>
                                  <td>Samsung Smart TV</td>
                                  <td><span class="badge badge-info">Processing</span></td>
                                  <td>
                                      <div class="sparkbar" data-color="#00c0ef" data-height="20">90,80,-90,70,-61,83,63</div>
                                  </td>
                              </tr>
                              <tr>
                                  <td><a href="pages/examples/invoice.html">OR1848</a></td>
                                  <td>Samsung Smart TV</td>
                                  <td><span class="badge badge-warning">Pending</span></td>
                                  <td>
                                      <div class="sparkbar" data-color="#f39c12" data-height="20">90,80,-90,70,61,-83,68</div>
                                  </td>
                              </tr>
                              <tr>
                                  <td><a href="pages/examples/invoice.html">OR7429</a></td>
                                  <td>iPhone 6 Plus</td>
                                  <td><span class="badge badge-danger">Delivered</span></td>
                                  <td>
                                      <div class="sparkbar" data-color="#f56954" data-height="20">90,-80,90,70,-61,83,63</div>
                                  </td>
                              </tr>
                          </tbody>
                      </table>
                      </div>
                  </div>
              <!-- /.card-body -->
              </div>
              <!-- /.card -->
              <!-- /.card -->
          </div>
          <!-- /.col -->

          <div class="col-md-4">
              <!-- Info Boxes Style 2 -->
              <div class="info-box mb-3 bg-secondary">
              <span class="info-box-icon"><i class="fas fa-tag"></i></span>

              <div class="info-box-content">
                  <span class="info-box-text">Description</span>
                  <span class="info-box-number">{{ students.description }}</span>
              </div>
              <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
              <div class="info-box mb-3 bg-success">
              <span class="info-box-icon"><i class="far fa-heart"></i></span>

              <div class="info-box-content">
                  <span class="info-box-text">Mentions</span>
                  <span class="info-box-number">92,050</span>
              </div>
              <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
              <div class="info-box mb-3 bg-danger">
              <span class="info-box-icon"><i class="fas fa-cloud-download-alt"></i></span>

              <div class="info-box-content">
                  <span class="info-box-text">Downloads</span>
                  <span class="info-box-number">114,381</span>
              </div>
              <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
              <div class="info-box mb-3 bg-info">
              <span class="info-box-icon"><i class="far fa-comment"></i></span>

              <div class="info-box-content">
                  <span class="info-box-text">Direct Messages</span>
                  <span class="info-box-number">163,921</span>
              </div>
              <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
          </div>
          <!-- /.col -->
          </div>
          <!-- /.row -->
      </div><!--/. container-fluid -->
  </section>
</template>
<script>
    import VueTagsInput from '@johmun/vue-tags-input';
   
    var current_url = window.location.href;
    const firstSegment = (new URL(current_url)).pathname.split('/')[3];
    
    const student_id = parseInt(firstSegment);
    export default {
      components: {
          
        },
        data () {
            return {
                editmode: false,
                students : {},
                form: new Form({
                    id : '',
                    category : '',
                    name: '',
                    description: '',
                    tags:  [],
                    photo: '',
                    category_id: '',
                    user_id:'',
                    address: '',
                    photoUrl: '',
                    fb_link: '',
                    phone:'',
                }),
                categories: [],
                users:[],
                tag:  '',
                autocompleteItems: [],
            }
        },
        methods: {
          loadStudents(){
            console.log(student_id);
            // if(this.$gate.isAdmin()){
              axios.get("/api/student/events/"+student_id).then(({ data }) => (this.students = data.data));
            // }
          },
          

        },
        mounted() {
            
        },
        created() {
            this.$Progress.start();
            this.loadStudents();
           
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