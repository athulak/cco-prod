<div class="main-content">
    <div class="wrap-content container" id="container">
        <!-- start: PAGE TITLE -->
        <section id="page-title">
            <div class="row">
                <div class="col-sm-8">
                    <h1 class="mainTitle">List Of Sessions</h1>
                </div>
            </div>
        </section>
        <!-- end: PAGE TITLE -->
        <!-- start: DYNAMIC TABLE -->
        <div class="container-fluid container-fullw">
            <div class="row">
                <div class="panel panel-primary" id="panel5">
                    <div class="panel-heading">
                        <h4 class="panel-title text-white">Sessions</h4>
                    </div>
                    <div class="panel-body bg-white" style="border: 1px solid #b2b7bb!important;">
                        <div class="row">
                            <div class="col-md-12 table-responsive">
                                <table class="table table-bordered table-striped text-center " id="sessions_table">
                                    <thead class="th_center">
                                        <tr>
                                            <th>Photo</th>
                                            <th>Title</th>
                                            <th>Presenter</th>
                                            <th>Time Slot</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (isset($sessions) && !empty($sessions)) {
                                            foreach ($sessions as $val) {
                                                ?>
                                                <tr>
                                                    <td>
                                                        <?php if ($val->sessions_photo != "") { ?>
                                                            <img src="<?= base_url() ?>uploads/sessions/<?= $val->sessions_photo ?>" style="height: 40px; width: 40px;">
                                                        <?php } else { ?>
                                                            <img src="<?= base_url() ?>front_assets/images/session_avtar.jpg" style="height: 40px; width: 40px;">
                                                        <?php } ?>
                                                    </td>
                                                    <td><?= $val->session_title ?></td>
                                                    <td><?php
                                                        if (isset($val->presenter) && !empty($val->presenter)) {
                                                            foreach ($val->presenter as $value) {
                                                                echo $value->presenter_name." <br>";
                                                            }
                                                        }
                                                        ?>
                                                    </td>
                                                    <td><?= date("h:i A", strtotime($val->time_slot)) .' - '. date("h:i A", strtotime($val->end_time)) ?></td>
                                                    <td>
                                                        <a href="<?= base_url() ?>presenter/sessions/view_question_answer/<?= $val->sessions_id ?>" class="btn btn-primary btn-sm">View Q&A</a>
                                                        <a href="<?= base_url() ?>presenter/sessions/create_poll/<?= $val->sessions_id ?>" class="btn btn-success btn-sm">Create Poll</a>
                                                        <a href="<?= base_url() ?>presenter/sessions/view_poll/<?= $val->sessions_id ?>" class="btn btn-info btn-sm">View Poll</a>
                                                        <a href="<?= base_url() ?>presenter/sessions/view_session/<?= $val->sessions_id ?>" class="btn btn-green btn-sm">View Session</a>
                                                        <a href="<?= base_url() ?>presenter/groupchat/sessions_groupchat/<?= $val->sessions_id ?>" class="btn btn-blue btn-sm">Create Chat</a>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $("#sessions_table").dataTable({
            "ordering": false,
        });
    });
</script>