<table id="productBrandsList" class="text-center listingPage">
    <thead class="text-capitalize">
        <!--tr>
            <th>Sl.No1:</th>
            <th>Name</th>
            <th>Description</th>
            <th>Updated Date</th>
            <th class="no-sorting">Actions</th>
        </tr-->

        <tr role="row">
                                                      <th class="sorting_asc" tabindex="0" aria-controls="data-source-1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 116px;">Menu Name</th>
                              
                                                      <th class="sorting" tabindex="0" aria-controls="data-source-1" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 220px;">Menu Url</th>

                                                                             <th class="sorting" tabindex="0" aria-controls="data-source-1" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 142px;">Menu Type</th>
                                                                             <th class="sorting" tabindex="0" aria-controls="data-source-1" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 142px;">Status</th>
                                                                             <th class="sorting" tabindex="0" aria-controls="data-source-1" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 142px;">Parent Menu</th>
                                                                          
                                                                             <th class="sorting" tabindex="0" aria-controls="data-source-1" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 142px;">Order No</th>
                                                           <th class="sorting taC" tabindex="0" aria-controls="data-source-1" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 151px;">Action</th></tr>






    </thead>
    <tbody>
        <?php 
        $slno = 0;
        foreach ($menu as $k => $res) {
            $slno++; ?>
            

            <tr role="row" class="odd" id="<?php echo $res['menuid'];?>" >
                                                      <td class="sorting_1"><?php echo $res['menuname'];?></td>
                                                    
                                                      <td><?php echo $res['url'];?></td>
                                                        <td><?php $mt=$res['menutype'];
                                                        if ($mt==1){
                                                            echo "Top Menu";
                                                        }else {
                                                            echo "Sub Menu";
                                                        }
                                                        
                                                        ?></td>
                                                          <td><?php $st=$res['status'];
                                                          if ($st==1){
                                                            echo "Active";
                                                        }else {
                                                            echo "InActive";
                                                        }
                                                          
                                                          
                                                          ?></td>
                                                      <td class="sorting_1"><?php $pmenuid=$res['parentmenuid'];
                                                      if ($pmenuid==-1){
                                                        echo "No Parent Menu";
                                                      }else 
                                                      {
                                                      $this->db->where('menuid',$pmenuid);
                                                      $this->db->select('*');
                                                      $this->db->from('menus');
                                                      $query = $this->db->get();
                                                      $mdt=$query->row();
                                                      echo $mdt->menuname;
                                                      }
                                                      
                                                      ?></td>
                                                      
                                                      <td class="sorting_1"><?php echo $res['orderno'];?></td> 
                                                      <td>
                                                      <ul class="d-flex justify-content-center">
                      
                        <li title="Edit" class="mr-3"><a href="<?=site_url()?>acp/Settings/editmenu/<?php echo $res['menuid'];?>" class="text-secondary"><i class="fa fa-pencil"></i></a></li>
                        
                       
                        <li data-menuid="<?php echo $res['menuid'];?>" data-action="delete" data-toggle="modal" data-target="#confirm" class="delete"><a href="#" class="text-danger"><i class="ti-trash"></i></a></li>
                    </ul>
                                                      </td>
                                                    </tr>

        <?php } ?>
    </tbody>
</table>
<!-- Modal -->
<div class="modal fade" id="confirm">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirm</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to Delete this Menu?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger">Confirm</button>
            </div>
        </div>
    </div>
</div>