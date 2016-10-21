<style>
    .line-info-config{
        margin-bottom: 35px;
    }
</style>
<div class="row">
    <div class="col-lg-12">
        <div class="ibox">
            <div class="ibox-title">
                <h5>Thêm thiết bị</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-wrench"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#">Config option 1</a>
                        </li>
                        <li><a href="#">Config option 2</a>
                        </li>
                    </ul>
                    <a class="close-link">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
                <h2>
                    Form thêm mới thiết bị
                </h2>
                <form id="form" action="<?php echo base_url().'Device/add'?>" class="wizard-big" method="POST">
                    <h1>Thông số thiết bị</h1>
                    <fieldset>
                        <h2>Thông số cơ bản</h2>
                        <div class="row">
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label>Name *</label>
                                    <input id="nameDev" name="nameDev" type="text" class="form-control required">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Serial *</label>
                                        <input id="serialDev" name="serialDev" type="text" class="form-control required">
                                    </div>
                                    
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label>mainboard *</label>
                                    <input id="mainboardDev" name="mainboardDev" type="text" class="form-control required">
                                    </div>
                                    <div class="col-md-6">
                                        <label>register-string *</label>
                                    <input id="registerStringDev" name="registerStringDev" type="text" class="form-control required">
                                    </div>
                                    
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label>sim-number *</label>
                                    <input id="simNumberDev" name="simNumberDev" type="text" class="form-control required">
                                    </div>
                                    <div class="col-md-6">
                                        <label>state *</label>
                                        <select name="stateDev" class="form-control required">
                                            <option value="1">Online</option>
                                            <option value="0">Offline</option>
                                            <option value="-1">Ẩn</option>
                                        </select>
                                    </div>
                                    
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label>Long *</label>
                                    <input id="longDev" name="longDev" type="text" class="form-control required">
                                    </div>
                                    <div class="col-md-6">
                                       <label>Lat *</label>
                                    <input id="latDev" name="latDev" type="text" class="form-control required"> 
                                    </div>
                                    
                                </div>
                                <div class="form-group">
                                    <label>Mô tả *</label>
                                    <textarea id="descriptionDev" name="descriptionDev" type="text" class="form-control required"></textarea>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>

</div>
<script>
    $(document).ready(function () {
        $("#wizard").steps();
        $("#form").steps({
            bodyTag: "fieldset",
            onStepChanging: function (event, currentIndex, newIndex)
            {
                // Always allow going backward even if the current step contains invalid fields!
                if (currentIndex > newIndex)
                {
                    return true;
                }
                console.log(newIndex);
                console.log(currentIndex);
                // Forbid suppressing "Warning" step if the user is to young
                if (newIndex === 3 && Number($("#age").val()) < 18)
                {
                    return false;
                }

                var form = $(this);
                console.log($(".body:eq(" + newIndex + ") label.error", form));
                // Clean up if user went backward before
                console.log('curr: ' + currentIndex);
                console.log('newindex: ' + newIndex);
                if (currentIndex < newIndex)
                {
                    // To remove error styles
                    $(".body:eq(" + newIndex + ") label.error", form).remove();
                    $(".body:eq(" + newIndex + ") .error", form).removeClass("error");
                }

                // Disable validation on fields that are disabled or hidden.
                form.validate().settings.ignore = ":disabled,:hidden";

                // Start validation; Prevent going forward if false
                return form.valid();
            },
            onStepChanged: function (event, currentIndex, priorIndex)
            {
                // Suppress (skip) "Warning" step if the user is old enough.
                if (currentIndex === 2 && Number($("#age").val()) >= 18)
                {
                    $(this).steps("next");
                }

                // Suppress (skip) "Warning" step if the user is old enough and wants to the previous step.
                if (currentIndex === 2 && priorIndex === 3)
                {
                    $(this).steps("previous");
                }
            },
            onFinishing: function (event, currentIndex)
            {
                var form = $(this);

                // Disable validation on fields that are disabled.
                // At this point it's recommended to do an overall check (mean ignoring only disabled fields)
                form.validate().settings.ignore = ":disabled";

                // Start validation; Prevent form submission if false
                return form.valid();
            },
            onFinished: function (event, currentIndex)
            {
                var form = $(this);

                // Submit form input
                form.submit();
            }
        }).validate({
            errorPlacement: function (error, element)
            {
                element.before(error);
            },
            rules: {
                stateDev:{
                    number: true,
                  min:-1,
                  max:1
                }
            }
        });
    });
</script>
