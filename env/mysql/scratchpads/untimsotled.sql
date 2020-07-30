

create table mso_stock_out as
select
id,
quantity
from mso_prod_out;


create table mso_price_out as
select
id,
price_tax_included,
wholesale_price,
on_sale,
disc_amount,
disc_percent,
disc_from,
disc_to,
supplier_reference,
supplier,
unit_base_price,
base_price
from mso_prod_out;



create table mso_assort as 
     select
     id,
     active,
     name,
     -- table: mso_prc, prices
     -- price_tax_included,
     tax_rules_id,
     -- table: mso_prc, prices
     -- wholesale_price,
     -- on_sale,
     -- disc_amount,
     -- disc_percent,
     -- disc_from,
     -- disc_to,
     reference_id,
     -- table: mso_, prices
     -- supplier_reference,
     -- supplier,
     manufacture,
     ean13,
     upc,
     ecotax,
     width,
     height,
     depth,
     weight,
     delivery_time_of_instock_items,
     delivery_time_of_oos_items,
     -- quantity
     min_quantity,
     low_stock_level,
     send_email_when_q_below,
     visibility,
     additional_shop_cost,
     -- table: mso_prc, prices
     -- unit_base_price,
     -- base_price
     short_desc,
     description,
     tags,
     meta_title,
     meta_keys,
     meta_desc,
     url_rewritten,
     text_when_in_stock,
     text_when_bo_allowed,
     avail_for_order,
     avail_date,
     create_date,
     show_price,
     image_urls,
     image_alts,
     del_exsiting_imgs,
     feature,
     avail_only_online,
     cond,
     is_customizable,
     is_uploadable,
     has_text_fields,
     is_out_of_stock,
     id_name_shop,
     adv_stock_man,
     depends_on_stock,
     warehouse
     from mso_prod_out





select
id,
active,
name,
mso_price_out.price_tax_included,
tax_rules_id,
mso_price_out.wholesale_price,
mso_price_out.on_sale,
mso_price_out.disc_amount,
mso_price_out.disc_percent,
mso_price_out.disc_from,
mso_price_out.disc_to,
reference_id,
mso_price_out.supplier_reference,
mso_price_out.supplier,
manufacture,
ean13,
upc,
ecotax,
width,
height,
depth,
weight,
delivery_time_of_instock_items,
delivery_time_of_oos_items,
mso_stock_out.quantity
min_quantity,
low_stock_level,
send_email_when_q_below,
visibility,
additional_shop_cost,
mso_price_out.unit_base_price,
mso_price_out.base_price
short_desc,
description,
tags,
meta_title,
meta_keys,
meta_desc,
url_rewritten,
text_when_in_stock,
text_when_bo_allowed,
avail_for_order,
avail_date,
create_date,
show_price,
image_urls,
image_alts,
del_exsiting_imgs,
feature,
avail_only_online,
cond,
is_customizable,
is_uploadable,
has_text_fields,
is_out_of_stock,
id_name_shop,
adv_stock_man,
depends_on_stock,
warehouse
from mso_prod_out
left outer join mso_price_out
 on mso_prod_out.id = mso_price_out.id
left outer join mso_stock_out
 on mso_prod_out.id = mso_stock_out.id;
 