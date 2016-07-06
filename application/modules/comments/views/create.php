<?php ?>
<div class=row>                      
    <div class=col-lg-12>
        <!-- col-lg-12 start here -->
        <div class="panel-default toggle panelMove panelClose panelRefresh">
            <!-- Start .panel -->
            <!--            <div class=panel-heading>
                            <h4 class=panel-title>  <?php echo ucwords("Add Forum comment"); ?></h4>                
                        </div>-->
            <div class="panel-body"> 

                <div class="box-content">  
                    <div class="">                      
                        <span style="color:red">* <?php echo "is " . ucwords("mandatory field"); ?></span> 
                    </div>                                                                    
<<<<<<< HEAD
                    <?php echo form_open(base_url() . 'comments/create/' . $param2, array('class' => 'form-horizontal form-groups-bordered validate', 'role' => 'form', 'id' => 'frmadmission_type','type'=>'POST', 'target' => '_top','enctype'=>'multipart/form-data')); ?>
=======
                    <?php echo form_open(base_url() . 'comments/create/' . $param2, array('class' => 'form-horizontal form-groups-bordered validate', 'role' => 'form', 'id' => 'frmadmission_type', 'type' => 'POST', 'target' => '_top', 'enctype' => 'multipart/form-data')); ?>
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                    <div class="padded">                        
                        <div class="form-group">
                            <label class="col-sm-4 control-label"><?php echo ucwords("Comment"); ?> <span style="color:red">*</span></label>
                            <div class="col-sm-8">
                                <textarea class="form-control" name="comment" onchange="return isEmpty(this);" id="comment"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
<<<<<<< HEAD
                                    <label class="col-sm-4 control-label"><?php echo ucwords("File"); ?></label>
                                    <div class="col-sm-8">
                                        <input type="file" name="topicfile"  >
                                    </div>
=======
                            <label class="col-sm-4 control-label"><?php echo ucwords("File"); ?></label>
                            <div class="col-sm-8">
                                <input type="file" name="topicfile"  >
                            </div>
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                        </div> 
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Status <span style="color:red">*</span></label>
                            <div class="col-sm-8">
                                <select name="comment_status" class="form-control">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>		
                                </select>	

                            </div>	
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-8">
                                <button type="submit" class="btn btn-info vd_bg-green">Add Comment</button>
                            </div>
                        </div>
                        </form>               
                    </div>                
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">

<<<<<<< HEAD
        
=======

>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
    $(document).ready(function () {

        $("#frmadmission_type").validate({
            rules: {
                comment: "required",
                comment_status: "required",
<<<<<<< HEAD
                 topicfile:{                       
                        extension:'gif|jpg|png|jpeg|pdf|xlsx|xls|doc|docx|ppt|pptx|txt'
                    },
=======
                topicfile: {
                    extension: 'gif|jpg|png|jpeg|pdf|xlsx|xls|doc|docx|ppt|pptx|txt'
                },
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
            },
            messages: {
                comment: "Enter Comment",
                comment_status: "Please select status",
<<<<<<< HEAD
                topicfile:{                       
                        extension:"Upload valid file",
                    },
=======
                topicfile: {
                    extension: "Upload valid file",
                },
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
            }
        });
    });
</script>
