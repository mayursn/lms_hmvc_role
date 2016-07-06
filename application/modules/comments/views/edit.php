<<<<<<< HEAD
<?php  $forum = $this->db->get("forum")->result_array();
            $this->db->where("forum_comment_id", $param2);
            $comment = $this->db->get("forum_comment")->result(); ?>
=======
<?php
$this->load->model('forum/Forum_model');
$this->load->model('comments/Forum_comment_model');
$forum = $this->Forum_model->get_all();
$comment = $this->Forum_comment_model->get($param2);
?>
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
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
                    <?php echo form_open(base_url() . 'comments/update/' . $param2, array('class' => 'form-horizontal form-groups-bordered validate', 'role' => 'form', 'id' => 'frmadmission_type', 'target' => '_top','enctype'=>'multipart/form-data')); ?>
                    <div class="padded">                        
                        <input type="hidden" name="comment_id" value="<?php echo $comment[0]->forum_comment_id; ?>">
=======
                    <?php echo form_open(base_url() . 'comments/update/' . $param2, array('class' => 'form-horizontal form-groups-bordered validate', 'role' => 'form', 'id' => 'frmadmission_type', 'target' => '_top', 'enctype' => 'multipart/form-data')); ?>
                    <div class="padded">                        
                        <input type="hidden" name="comment_id" value="<?php echo $comment->forum_comment_id; ?>">
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                        <div class="form-group">

                            <label class="col-sm-4 control-label"><?php echo ucwords("Comment"); ?> <span style="color:red">*</span></label>
                            <div class="col-sm-8">
<<<<<<< HEAD
                                <textarea class="form-control" name="comment" onchange="return isEmpty(this);"  id="comment"><?php echo $comment[0]->forum_comments; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                                    <label class="col-sm-4 control-label"><?php echo ucwords("File"); ?></label>
                                    <div class="col-sm-8">
                                        <input type="file" name="topicfile"  >
                                    </div>
=======
                                <textarea class="form-control" name="comment" onchange="return isEmpty(this);"  id="comment"><?php echo $comment->forum_comments; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
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
                                    <option value="1" <?php
<<<<<<< HEAD
                                    if ($comment[0]->forum_comment_status == "1") {
=======
                                    if ($comment->forum_comment_status == "1") {
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                                        echo "selected=selected";
                                    }
                                    ?>>Active</option>
                                    <option value="0"  <?php
<<<<<<< HEAD
                                    if ($comment[0]->forum_comment_status == "0") {
=======
                                    if ($comment->forum_comment_status == "0") {
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                                        echo "selected=selected";
                                    }
                                    ?>>Inactive</option>		
                                </select>	

                            </div>	
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-8">
                                <button type="submit" class="btn btn-info vd_bg-green">Update Comment</button>
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
function isEmpty(str) {         
    return str.toString().replace(/^\s+|\s+$/gm,'').length == 0;
        }
=======
    function isEmpty(str) {
        return str.toString().replace(/^\s+|\s+$/gm, '').length == 0;
    }
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
