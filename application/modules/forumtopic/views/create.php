<<<<<<< HEAD
<?php 
$this->db->select('forum_id, forum_title, forum_status, created_date');
            $this->db->order_by("forum_id","desc");
            $forum =  $this->db->get('forum')->result_array();
=======
<?php
$this->load->Model('forum/Forum_model');
$forum = $this->Forum_model->get_all();
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
?>
<div class=row>                      
    <div class=col-lg-12>
        <!-- col-lg-12 start here -->
<<<<<<< HEAD
        <div class="panel-default toggle panelMove panelClose panelRefresh">
            <!-- Start .panel -->
            <!--            <div class=panel-heading>
                            <h4 class=panel-title>  <?php echo ucwords("Add Forum topic"); ?></h4>                
                        </div>-->
=======
        <div class="panel-default toggle panelMove panelClose panelRefresh">         
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
            <div class="panel-body"> 

                <div class="box-content">  
                    <div class="">
                        <span style="color:red">* <?php echo "is " . ucwords("mandatory field"); ?></span> 
                    </div>                                                                    
<<<<<<< HEAD
                    <?php echo form_open(base_url() . 'forumtopic/create', array('class' => 'form-horizontal form-groups-bordered validate', 'role' => 'form', 'id' => 'frmadmission_type', 'target' => '_top','enctype'=>'multipart/form-data')); ?>
=======
                    <?php echo form_open(base_url() . 'forumtopic/create', array('class' => 'form-horizontal form-groups-bordered validate', 'role' => 'form', 'id' => 'frmadmission_type', 'target' => '_top', 'enctype' => 'multipart/form-data')); ?>
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                    <div class="padded">
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Forum <span style="color:red">*</span></label>
                            <div class="col-sm-8">
                                <select name="forum_id"  class="form-control">
                                    <option value="">Select Forum</option>
                                    <?php foreach ($forum as $form): ?>
<<<<<<< HEAD
                                        <option value="<?php echo $form['forum_id']; ?>"><?php echo $form['forum_title']; ?></option>
=======
                                        <option value="<?php echo $form->forum_id; ?>"><?php echo $form->forum_title; ?></option>
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                                    <?php endforeach; ?>                                                    
                                </select>	

                            </div>	
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Topic Title<span style="color:red">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="topic_title" id="topic_title" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label"><?php echo ucwords("Description"); ?></label>
                            <div class="col-sm-8">
                                <textarea class="form-control" name="description" id="description"></textarea>
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
                                <select name="topic_status" class="form-control">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>		
                                </select>	

                            </div>	
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-8">
                                <button type="submit" class="btn btn-info vd_bg-green">Add forum Topic</button>
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

    $().ready(function () {
        $("#frmadmission_type").validate({
            rules: {
                forum_id: "required",
                topic_title: "required",
                topic_status: "required",
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
                forum_id: "Select Forum",
                topic_title:
                        {
                            required: "Enter topic title",
                        },
                topic_status: "Please select status",
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
