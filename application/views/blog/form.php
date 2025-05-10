<?
$url = "/";
if (intval($blog->id) > 0)
{
    $url = $blog->id."/";
}
?>

<div class="content-wrapper">
    <!--Statistics cards Starts-->
    <section id="form-action-layouts">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="from-actions-multiple">Add / Edit Blog</h4>
                    </div>
                    <div class="card-body">
                        <div class="px-3">
                            <form class="form" enctype="multipart/form-data" method="post" action="<?php echo base_url().'blogpost/save/'.$url ?>">
                                <input type="hidden" name="id" value="<?=$blog->id?>" />
                                <div class="justify-content-md-center">
                                        <div class="row">
                                            <div class="form-group col-md-12 mb-2">
                                                <label for="projectinput4">Title</label>
                                                <input type="text" name="title" value="<?=$blog->title?>" id="title" class="form-control" />
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-12 mb-2">
                                                <label for="projectinput4">URL</label>
                                                <input type="text" name="url" value="<?=$blog->url?>" id="url" class="form-control" />
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-12 mb-2">
                                                <label for="projectinput4">Content</label>
                                                <textarea class="form-control contentarea" name="content"><?=$blog->content?></textarea>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-12 mb-2">
                                                <label for="projectinput4">Meta Title</label>
                                                <textarea class="form-control" name="meta_title"><?php echo isset($blog->meta_title) ? $blog->meta_title : ""; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12 mb-2">
                                                <label for="projectinput4">Meta Description</label>
                                                <textarea class="form-control" name="meta_description"><?php echo isset($blog->meta_description) ? $blog->meta_description : ""; ?></textarea>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-3 mb-2">
                                                <label for="projectinput3">Active</label>
                                                <select required="required" name="is_active" id="is_active" name="is_active" class="form-control">
                                                        <option <?php echo (isset($blog->is_active) && $blog->is_active == 1) ? "selected" : ""; ?> value="1">Yes</option>
                                                        <option <?php echo (isset($blog->is_active) && $blog->is_active == 2) ? "selected" : ""; ?> value="2">No</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-3 mb-2">
                                                <label for="projectinput3">Featured</label>
                                                <select required="required" name="is_featured" id="is_featured" name="is_featured" class="form-control">
                                                    <option <?php echo (isset($blog->is_featured) && $blog->is_featured == 2) ? "selected" : ""; ?> value="2">No</option>
                                                    <option <?php echo (isset($blog->is_featured) && $blog->is_featured == 1) ? "selected" : ""; ?> value="1">Yes</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-3 mb-2">
                                                <label for="projectinput3">Homepage</label>
                                                <select required="required" name="is_homepage" id="is_homepage" name="is_homepage" class="form-control">
                                                        <option <?php echo (isset($blog->is_homepage) && $blog->is_homepage == 2) ? "selected" : ""; ?> value="2">No</option>
                                                        <option <?php echo (isset($blog->is_homepage) && $blog->is_homepage == 1) ? "selected" : ""; ?> value="1">Yes</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-3 mb-2">
                                                <label for="projectinput3">Thumbnail</label>
                                                <input type="file" name="thumb" class="form-control-file" id="projectinput8">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions clearfix">
                                        <div class="buttons-group">
                                            <button type="submit" class="btn btn-raised btn-primary mr-1">
                                            <i class="fa fa-check-square-o"></i> Save
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>