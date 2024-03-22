<?php
    echo '<input type="text" placeholder="Tìm phim theo tên" id="searchName">
    <select id="searchCategory">
        <option selected>Tất cả</option>
        <option>Tình cảm</option>
        <option>Hài hước</option>
        <option>Gia đình</option>
        <option>Kinh dị</option>
    </select>
    <span id="searchPriceRange">
        <input type="number" min="45000" step="5000" placeholder="Giá">
        <span>đến</span>
        <input type="number" min="45000" step="5000" placeholder="Giá">
    </span>
    <span id="searchDateRange">
        <input type="date" name="start_date">
        <span>đến</span>
        <input type="date" name="end_date">
    </span>
    <button class="btn_reset" type="reset">RESET</button>
    <button class="btn_search" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>';


?>