<?php $__env->startSection('content'); ?>


<div class="modal fade" id="AddUserModal" tabindex="-1" aria-labelledby="AddUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="AddUserModalLabel">Add User Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="mx-1 mx-md-4" id="submit-user" method="POST" enctype="multipart/form-data"> 

                <div class="modal-body">

                    <ul id="save_msgList"></ul>

                    <div class="form-group mb-3">
                        <label for="">Name</label>
                        <input type="text" name="name"  class="name form-control">
                    </div> 
                    <div class="form-group mb-3">
                        <label for="">Email</label>
                        <input type="text"  name="email"  class="email form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Phone No</label>
                        <input type="text" name="phone" placeholder="910000000000"placeholder="910000000000" class="phone form-control">
                    </div>

                    <div class="form-group mb-3">
                        <label for="description">Description</label>
                        <textarea id="description" name="description"  class="description form-control"></textarea>
                    </div>
    
                    <div class="form-group mb-3">
                        <label for="">Role</label>
                        <select  class="role form-control" name="role">
                        <option value="">Select Role</option>
                            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                            <?php if(old('role') == $role): ?>
                            <option value="<?php echo e($key); ?>" selected><?php echo e($role); ?></option>
                            <?php else: ?>
                            <option value="<?php echo e($key); ?>"><?php echo e($role); ?></option>
                            <?php endif; ?>
                            
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="">Profile Image</label>
                        <input type="file" name="profile"  class="profile form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary add_user">Save</button>
                </div>
            </form>

        </div>
    </div>
</div>



<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit & Update User Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form class="mx-1 mx-md-4" id="update-user" method="POST" enctype="multipart/form-data"> 

                <div class="modal-body">

                    <ul id="save_msgList"></ul>
                    <input type="hidden" id="stud_id">
                    <div class="form-group mb-3">
                        <label for="">Name</label>
                        <input type="text" id="name" name="name"  class="name form-control">
                    </div> 
                    <div class="form-group mb-3">
                        <label for="">Email</label>
                        <input type="text" id="email" name="email"  class="email form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Phone No</label>
                        <input type="text" id="phone" name="phone" placeholder="910000000000"placeholder="910000000000" class="phone form-control">
                    </div>

                    <div class="form-group mb-3">
                        <label for="description">Description</label>
                        <textarea id="description" id="description" name="description"  class="description form-control"></textarea>
                    </div>
    
                    <div class="form-group mb-3">
                        <label for="">Role</label>
                        <select  class="role form-control" name="role" id="role">
                        <option value="">Select Role</option>
                            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                            <?php if(old('role') == $role): ?>
                            <option value="<?php echo e($key); ?>" selected><?php echo e($role); ?></option>
                            <?php else: ?>
                            <option value="<?php echo e($key); ?>"><?php echo e($role); ?></option>
                            <?php endif; ?>
                            
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="">Profile Image</label>
                        <input type="file" name="profile" id="profile"  class="profile form-control">
                        <spna id="edit_profile"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary update_user">Update</button>
                </div>
            </form>

        </div>
    </div>
</div>




<div class="modal fade" id="DeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete User Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h4>Confirm to Delete Data ?</h4>
                <input type="hidden" id="deleteing_id">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary delete_user">Yes Delete</button>
            </div>
        </div>
    </div>
</div>


<div class="container py-5">
    <div class="row">
        <div class="col-md-12">

            <div id="success_message"></div>

            <div class="card">
                <div class="card-header">
                    <h4>
                        User Data
                        <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal"
                            data-bs-target="#AddUserModal">Add User</button>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Profile</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Role</th>
                                <th>Decription</th>  
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<script>
    $(document).ready(function () {
        var base_url = "<?php echo e(URL::to('/')); ?>/images/";
        var roles = JSON.parse('<?php echo json_encode($roles); ?>');
       
        fetchuser();

        function fetchuser() {
            $.ajax({
                type: "GET",
                url: "/fetch-users",
                dataType: "json",
                success: function (response) {
                    // console.log(response);
                    $('tbody').html(""); 
                    $.each(response.users, function (key, item) {
                        let path = base_url + item.profile_image; 
                        $('tbody').append('<tr>\
                            <td>' + item.id + '</td>\
                            <td><img style="width: 40px;height: 40px;border-radius: 50%;" src="' + path + '"></td>\
                            <td>' + item.name + '</td>\
                            <td>' + item.email + '</td>\
                            <td>' + item.phone + '</td>\
                            <td>' + roles[item.role_id] + '</td>\
                            <td>' + item.description + '</td>\
                            \</tr>');
                    });
                }
            });
        }

        $(document).on('click', '.add_user', function (e) { 
            e.preventDefault();
            //let data = $('#submit-user').serialize();  
            var form = $('#submit-user')[0]; 
            var data = new FormData(form); 
            $(this).text('Sending..'); 
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "/users",
                data: data,
                dataType: "json",
                processData: false,  // Important!
                contentType: false,

                success: function (response) {
                    // console.log(response);
                    if (response.status == 400) {
                        $('#save_msgList').html("");
                        $('#save_msgList').addClass('alert alert-danger');
                        $.each(response.errors, function (key, err_value) {
                            $('#save_msgList').append('<li>' + err_value + '</li>');
                        });
                        $('.add_user').text('Save');
                    } else {
                        $('#save_msgList').html("");
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);
                        $('#AddUserModal').find('input').val('');
                        $('.add_user').text('Save');
                        $('#AddUserModal').modal('hide');
                        fetchuser();
                    }
                }
            });

        });
 
       

    });

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/user-crud-app-1/resources/views/user/index.blade.php ENDPATH**/ ?>