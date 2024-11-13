SET GLOBAL event_scheduler = ON;
DELIMITER $$

DROP EVENT IF EXISTS update_discount_status_event $$

CREATE EVENT update_discount_status_event
ON SCHEDULE EVERY 1 DAY
DO
BEGIN
    DECLARE curr_date DATE;
    SET curr_date = CURDATE();

    -- Cập nhật trạng thái 'hd' (hoạt động) cho mã giảm giá đang trong thời gian áp dụng
    UPDATE magiamgia
    SET trangthai = 'hd'
    WHERE ngaybatdau <= curr_date AND ngayketthuc >= curr_date AND trangthai != 'huy';

    -- Cập nhật trạng thái 'hh' (hết hạn) cho mã giảm giá đã qua ngày kết thúc
    UPDATE magiamgia
    SET trangthai = 'hh'
    WHERE ngayketthuc < curr_date AND trangthai != 'huy';

    -- Giữ nguyên trạng thái 'huy' cho mã giảm giá đã bị hủy
END $$

DELIMITER ;
