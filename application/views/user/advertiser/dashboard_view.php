
<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Blocked Campaigns</h4>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th> Title </th>
                            <th> Category </th>
                            <th> Display Link </th>
                            <th> Destination Link  </th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
//                        var_dump($incomplete_campaign_list);
                        foreach ($incomplete_campaign_list as $value)
                        {
                        ?>
                        <tr>
                            <td><?= $value['text_title'] ?> </td>
                            <td> <?= $value['category'] ?> </td>
                            <td>
                                <?php
                                if($value['disp_link'] == null)
                                {
                                    echo "Invalid";
                                }else{
                                    echo $value['disp_link'];
                                }
                                ?>
                            </td>
                            <td> <?= $value['dest_link'] ?> </td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-outline-secondary btn-gradient-info dropdown-toggle" data-toggle="dropdown">Action</button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item">Edit</a>
                                        <a class="dropdown-item">Delete</a>
                                    </div>
                                </div>
                            </td>

                        </tr>
                        <?php } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>




