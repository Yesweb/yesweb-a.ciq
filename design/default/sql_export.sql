/*sql penjualan */
SELECT
	`lh_produk`.`artist` AS artist,
	`lh_produk`.`image` AS image,
	`lh_produk`.`title` AS title,
	`lh_produk`.`description` AS description,
	`lh_penjualan_stat`.`stat_name` AS stat_name,
	`lh_produk`.`price` AS idr_artist_price,
	`lh_produk`.`priceUS` AS usd_artist_price,
	`lh_produk`.`hpam_price` AS idr_hpam_price,
	`lh_produk`.`hpam_priceUS` AS usd_hpam_price,
	`lh_customer`.`nama` AS buyer,
	`lh_penjualan`.`discount` AS discount,
	(`lh_produk`.`hpam_price` - ((`lh_produk`.`hpam_price` / 100) * `lh_penjualan`.`discount`)) AS idr_invoice,
	(`lh_produk`.`hpam_priceUS` - ((`lh_produk`.`hpam_priceUS` / 100) * `lh_penjualan`.`discount`)) AS usd_invoice,
	`lh_invoice`.`invoice_number` AS invoice_number,
	`lh_invoice`.`kwitansi` AS kwitansi,
	`lh_invoice_status`.`status` AS status
FROM `lh_penjualan`
JOIN `lh_produk`
	ON `lh_penjualan`.`id_produk`=`lh_produk`.`id_produk`
JOIN `lh_penjualan_stat`
	ON `lh_penjualan`.`id_status`=`lh_penjualan_stat`.`stat_code`
JOIN `lh_customer`
	ON `lh_penjualan`.`id_customer`=`lh_customer`.`id_customer`
JOIN `lh_invoice`
	ON `lh_penjualan`.`invoice_number`=`lh_invoice`.`id_invoice`
JOIN `lh_invoice_status`
	ON `lh_invoice`.`invoice_status`=`lh_invoice_status`.`id_inv_stat`
	
/*sql DP */
SELECT
	`lh_invoice`.`invoice_number` AS invoice_number,
	`lh_invoice`.`kwitansi` AS kwitansi,
	`lh_invoice_kwitansidp`.`no_kwitansi` AS kwitansi_dp,
	`lh_invoice_kwitansidp`.`dp` AS idr_dp,
	`lh_invoice_kwitansidp`.`dpUS` AS usd_dp
FROM `lh_invoice_kwitansidp`
JOIN `lh_invoice`
	ON `lh_invoice_kwitansidp`.`id_invoice`=`lh_invoice`.`id_invoice`
	
/*sql single */
SELECT
	`lh_produk`.`artist` AS artist,
	`lh_produk`.`image` AS image,
	`lh_produk`.`title` AS title,
	`lh_produk`.`description` AS description,
	`lh_penjualan_stat`.`stat_name` AS stat_name,
	`lh_produk`.`price` AS idr_artist_price,
	`lh_produk`.`priceUS` AS usd_artist_price,
	`lh_produk`.`hpam_price` AS idr_hpam_price,
	`lh_produk`.`hpam_priceUS` AS usd_hpam_price,
	`lh_customer`.`nama` AS buyer,
	`lh_penjualan`.`discount` AS discount,
	(`lh_produk`.`hpam_price` - ((`lh_produk`.`hpam_price` / 100) * `lh_penjualan`.`discount`)) AS idr_invoice,
	(`lh_produk`.`hpam_priceUS` - ((`lh_produk`.`hpam_priceUS` / 100) * `lh_penjualan`.`discount`)) AS usd_invoice,
	`lh_invoice`.`invoice_number` AS invoice_number,
	`lh_invoice`.`kwitansi` AS kwitansi,
	`lh_invoice_status`.`status` AS status,
	`lh_invoice_kwitansidp`.`no_kwitansi` AS kwitansi_dp,
	`lh_invoice_kwitansidp`.`dp` AS idr_dp,
	`lh_invoice_kwitansidp`.`dpUS` AS usd_dp,
	((`lh_produk`.`hpam_price` - ((`lh_produk`.`hpam_price` / 100) * `lh_penjualan`.`discount`)) - `lh_invoice_kwitansidp`.`dp`) AS idr_total_due,
	((`lh_produk`.`hpam_priceUS` - ((`lh_produk`.`hpam_priceUS` / 100) * `lh_penjualan`.`discount`)) - `lh_invoice_kwitansidp`.`dpUS`) AS usd_total_due
FROM `lh_penjualan`
JOIN `lh_produk`
	ON `lh_penjualan`.`id_produk`=`lh_produk`.`id_produk`
JOIN `lh_penjualan_stat`
	ON `lh_penjualan`.`id_status`=`lh_penjualan_stat`.`stat_code`
JOIN `lh_customer`
	ON `lh_penjualan`.`id_customer`=`lh_customer`.`id_customer`
JOIN `lh_invoice`
	ON `lh_penjualan`.`invoice_number`=`lh_invoice`.`id_invoice`
JOIN `lh_invoice_status`
	ON `lh_invoice`.`invoice_status`=`lh_invoice_status`.`id_inv_stat`
LEFT JOIN `lh_invoice_kwitansidp`
	ON `lh_penjualan`.`invoice_number`=`lh_invoice_kwitansidp`.`id_invoice`