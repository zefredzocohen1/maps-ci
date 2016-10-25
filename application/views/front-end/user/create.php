<div class="lage-box text-center createuser  animated fadeInDown">
    <div>
        <h3>Register to Maps pro</h3>
        <p>Create account to see it in action.</p>
        <form class="m-t" role="form" method="POST" id="createUser">
            <div class="form-group">
                <input type="text" class="form-control" name="username" id="username" placeholder="Name" required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password" required>
            </div>
            <div class="form-group">
                <?php if(!empty($roles)):?>
                <select class="form-control m-b" name="permisson">
                    <option value="-1">Quyền truy cập</option>
                    <?php foreach ($roles as $role =>$index):?>
                    <option value="<?php echo $index?>"><?php echo $role ?></option>
                    <?php endforeach;?>
                </select>
                <?php endif;?>
            </div>
            <input type="submit" class="btn btn-primary block full-width m-b" value="Register">
        </form>
        <p class="m-t"> <small>Maps pro &copy; 2016</small> </p>
    </div>
</div>
<script>
$(document).ready(function () {
    $('#createUser').validate({
            rules: {
                username: {
                    required: true,
                    minlength: 3
                },
                password: {
                    required: true,
                    minlength: 3
                },
                permisson: {
                    required: true,
                    min: 1,
                    max:2
                }
            },
            messages: {
                username: {
                    required: 'Trường không được để trống',
                    minlength: 'Tên phải chứa ít nhất 3 ký tự'
                },
                password: {
                    required: 'Trường không được để trống',
                    minlength: 'Độ dài mật khẩu phải lớn hơn 3'
                },
                permisson: {
                    required: true,
                    min: 'Chọn sai quyền',
                    max:'Chọn sai quyền'
                }
            },
        });
    
});
</script>