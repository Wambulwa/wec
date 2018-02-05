-- GIVES 1122
SELECT COUNT(consignment.cons_id) 
FROM consignment, cons_bill_of_landing, cons_notes, cons_acc_info 
WHERE 
(
    consignment.cons_id=cons_bill_of_landing.bol_cons_id AND DATE(cons_bill_of_landing.bol_added_on)=DATE(CURDATE())
)
 OR 
 (
     consignment.cons_id=cons_notes.cons_id AND DATE(cons_notes.added_on)=DATE(CURDATE())
 )
 OR 
 (
     consignment.cons_id=cons_acc_info.cons_cons_id AND DATE(cons_acc_info.cons_acc_info_added_on)=DATE(CURDATE())
 )

-- //GIVES 1122