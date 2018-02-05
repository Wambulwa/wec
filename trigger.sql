CREATE TRIGGER `insert_amount_due_as_total` AFTER INSERT ON `invoice_charges`
 FOR EACH ROW UPDATE invoice SET invoice.amount_due=SUM(invoice_charges.amount) WHERE invoice.invoice_id=new.invoice_id