<table id="customersList" class="text-center listingPage">
    <thead class="text-capitalize">
        <tr>
            <th>No</th>
            <th>Customer Name:</th>
            <th>Grand Total</th>
           
            <th class="no-sorting">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $slno = 0;
        //print_r($billcustomers);
        //die;
        foreach ($billcustomers as $k => $customerVal) {
            $slno++; ?>
            <tr>
                <td><?=$slno?></td>
                <td><?php //echo trim($customerVal['customer_id']);
                
                $custid=trim($customerVal['customer_id']);
                $this->db->where('userid',$custid);
        $this->db->from('userlogin');
        $query = $this->db->get();
         $dt=$query->row();
        // echo $this->db->last_query();
            echo $dt->name.' '.$dt->lastname;    
                
                
                ?></td>
                <td><?=$customerVal['grand_total']?></td>
              
                

               
                <td>
                    <ul class="d-flex justify-content-center">
                       

                        <li data-custid="<?=$customerVal['id']?>" data-action="delete" data-toggle="modal" data-target="#confirm" class="delete"><a href="#" class="text-danger"><i class="ti-trash"></i></a></li>
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
                <p>Are you sure you want to Delete this Billing details?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger">Confirm</button>
            </div>
        </div>
    </div>
</div>