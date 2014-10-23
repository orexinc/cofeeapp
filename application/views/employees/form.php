<?php $this->load->view("partial/header.tpl"); ?>

 <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <?php $this->load->view("partial/sidebar.tpl"); ?>
                <!-- /.sidebar -->
            </aside>

    <!-- Right side column. Contains the navbar and content of the page -->
    <aside class="right-side">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Merchant Informations
                <small>Add new merchant</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Locations</a></li>
                <li class="active">Add New</li>
            </ol>
        </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <!-- Location column -->
                        <form role="form" id="form_location">
                            <!-- left column -->   
                            <div class="col-md-6">
                                <!-- general form elements disabled -->
                                <div class="box box-warning">
                                    <div class="box-body">
                                        
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input type="text" name="first_name" class="form-control" placeholder="New Cofee Ltd"/>
                                            </div>
                                            <div class="form-group">
                                                <label>Last Name</label>
                                               <input type="text" name="last_name" class="form-control" placeholder="We provide tasty coffees"/>
                                            </div>

                                           <div class="form-group">
                                                <label>Email</label>
                                               <input type="email" name="email" class="form-control" placeholder="We provide tasty coffees"/>
                                            </div>

                                            <div class="form-group">
                                                <label>Phone Number</label>
                                               <input type="tel" name="phone_number" class="form-control" placeholder="We provide tasty coffees"/>
                                            </div>

                                            <div class="form-group">
                                                <label>User Name</label>
                                               <input type="text" name="username" class="form-control" placeholder="+44 77756 2335"/>
                                            </div>

                                             <div class="form-group">
                                                <label>Password</label>
                                               <input type="password" name="password" class="form-control" placeholder="+44 77756 2335"/>
                                            </div>

                                            <div class="form-group">
                                                <label>Re type Password</label>
                                               <input type="password" name="password_confirm" class="form-control" placeholder="+44 77756 2335"/>
                                            </div>
                                           
                                    </div><!-- /.box-body -->
                                </div><!-- /.box -->
                            </div><!--/.col (left) -->

                             <!-- right column -->   
                             <div class="col-md-6">
                                <!-- general form elements disabled -->
                                <div class="box box-warning">
                                    <div class="box-body">
                                            
                                            <legend><?php echo $this->lang->line("employees_permission_info"); ?></legend>
											<p><?php echo $this->lang->line("employees_permission_desc"); ?></p>


											<ul id="permission_list">
											<?php
											foreach($all_modules as $key => $pmodule)
											{ //var_dump($module);exit();
											?>
											<li>	
											<?php echo form_checkbox("permissions[]",$pmodule->parent['module_id'],$this->Employee->has_permission($pmodule->parent['module_id'],$person_info->person_id)); ?>
											<span class="medium"><?php echo $this->lang->line('module_'.$pmodule->parent['module_id']);?>:</span>
											<span class="small"><?php echo $this->lang->line('module_'.$pmodule->parent['module_id'].'_desc');?></span>
												<!-- <ul id="permission_list">
												<?php foreach($pmodule->childModules as $module)
												{ //var_dump($module);exit();
												?>
												<li>	
													 <?php echo form_checkbox("permissions[]",$module['module_id'],$this->Employee->has_permission($module['module_id'],$person_info->person_id)); ?>
													<span class="medium"><?php echo $this->lang->line($pmodule->parent['module_id']."_".$module['module_id']);?>:</span>
													<span class="small"><?php echo $this->lang->line($pmodule->parent['module_id']."_".$module['module_id'].'_desc');?></span>
												</li>
												<?php } ?>
												</ul> -->
											<li>
											</li>
											<?php
											}
											?>
											</ul>

                                                      
                                    </div><!-- /.box-body -->
                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div><!-- /.box -->

                            </div><!--/.col (right) -->
                        </form>
                    </div>   <!-- /.row -->
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

<?php $this->load->view("partial/footer.tpl"); ?>
<script src="<?=base_url('assests/js/plugins/jquery_validation/jquery.validate.min.js')?>" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() { 

    $('#form_location').validate({
                errorElement: 'span', 
                errorClass: 'error', 
                focusInvalid: true, 
                rules: {
                    first_name: {
                        required: true
                    },
                    last_name: {
                        required: true
                    },
                    email : {
                      required: true,
                      email: true
                    },
                    phone_number: {
                        required: true
                    },
                    username : {
                        required: true
                    },
                    password: {
                        required: true
                    }
                },

                submitHandler: function (form) {
                     $.ajax({
                          type: "POST",
                          url: "<?php echo base_url('index.php/employees/save'); ?>",
                          data: $('#form_location').serialize(),
                          success: function (data) {
                                alert('Data Added');
                          }
                      });
                }
            }); 

});
</script>