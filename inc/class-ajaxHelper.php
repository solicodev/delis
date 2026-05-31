<?php

class AjaxHelper
{
    public function __construct()
    {
        add_action('wp_ajax_nopriv_get_product', array($this, 'delis_get_products'));
        add_action('wp_ajax_get_product', array($this, 'delis_get_products'));

        add_action('wp_ajax_success_register', array($this, 'delis_success_register'));
        add_action('wp_ajax_nopriv_success_register', array($this, 'delis_success_register'));

        add_action('wp_ajax_send_otp', array($this, 'delis_send_otp'));
        add_action('wp_ajax_nopriv_send_otp', array($this, 'delis_send_otp'));

        add_action('wp_ajax_nopriv_process_resend_otp', array($this, 'delis_send_otp'));
        add_action('wp_ajax_process_resend_otp', array($this, 'delis_send_otp'));

        add_action('wp_ajax_verify_otp', array($this, 'delis_verify_otp'));
        add_action('wp_ajax_nopriv_verify_otp', array($this, 'delis_verify_otp'));

        add_action('wp_ajax_upload_compressed_image', array($this, 'delis_upload_compressed_image'));
        add_action('wp_ajax_nopriv_upload_compressed_image', array($this, 'delis_upload_compressed_image'));

        add_action('after_setup_theme', array($this, 'delis_create_user_paint_table'));

        add_action('admin_menu', [$this,'delis_admin_menu']);

        add_action('wp_ajax_add_paint', array($this, 'delis_add_paint'));
        add_action('wp_ajax_nopriv_add_paint', array($this, 'delis_add_paint'));



    }


    function
    delis_admin_menu()
    {
        add_menu_page(
            __('Users Paint', 'delis'),
            __('Users Paint', 'delis'),
            'edit_others_posts',
            'Paints',
            [$this,'delis_users_contents'],
            'dashicons-admin-users',
            3
        );
    }
    function delis_success_register()
    {
        $phone = sanitize_text_field($_POST['mobile']);
        if ($this->allowed_numbers($phone)['allowed']) {
            $this->send_success_sms($this->allowed_numbers($phone)['phone'], $this->allowed_numbers($phone)['phone']);
        }
    }
    function delis_users_contents()
    {
        $allpaints = $this->delis_get_all_custom_users();
//        $players = $this->get_all_data(100);
//        $verified = $this->get_verified_user();

        ?>
        <style>
            .card-wrap {
                display: flex;
                justify-content: space-between;
                margin-bottom: 20px;
                gap: 20px;
                flex-wrap: wrap;
            }
            .card-wrap .card{
                width: 100%;
            }
            .card-wrap .card h2{
                font-size: 22px;
            }
            .card-wrap .card p{
                font-size: 18px;
                font-weight: bold;
            }
            @media (min-width: 767px) {
                .card-wrap {
                    flex-wrap: nowrap;
                }

            }
        </style>
        <div class="wrap">
            <h1>ProHero Landing Report</h1>
            <p>for export all campaign users click <a href="#" class="page-title-action">Export Users</a></p>
            <div class="card-wrap">
                <div class="card">
                    <h2>Total Leads</h2>
                    <p><?php //echo number_format(count($allplayers),0,',');?> Users</p>
                </div>

                <div class="card">
                    <h2>Verified User</h2>
                    <p><?php //echo number_format(count($verified),0,',');?> Users</p>
                </div>
            </div>
            <table class="widefat fixed striped" cellspacing="0">
                <thead>
                <tr>

                    <th id="cb" class="manage-column column-cb check-column" scope="col"></th>
                    <th id="image" class="manage-column column-name" scope="col">Image</th>
                    <th id="name" class="manage-column column-name" scope="col">Name</th>
                    <th id="date" class="manage-column column-child" scope="col">Date</th>
                    <th id="phone" class="manage-column column-phone" scope="col">Phone Number</th>
                    <th id="status" class="manage-column column-status" scope="col">Verified</th>

                </tr>
                </thead>

                <tfoot>
                <tr>
                    <th class="manage-column column-cb check-column" scope="col"></th>
                    <th class="manage-column column-image" scope="col"></th>
                    <th class="manage-column column-name" scope="col"></th>
                    <th class="manage-column column-date" scope="col"></th>
                    <th class="manage-column column-date" scope="col"></th>
                    <th class="manage-column column-phone" scope="col"></th>
                    <th class="manage-column column-status" scope="col"></th>
                </tr>
                </tfoot>
                <tbody>
                <?php foreach ($allpaints as $paint): ?>
                    <tr>
                        <th class="check-column" scope="row"></th>
                        <td class="column-image"><img src="<?php echo $paint['image_url']; ?>" style="max-height: 100px"/> </td>
                        <td class="column-name"><?php echo $paint['full_name']; ?></td>
                        <td class="column-child"><?php echo $paint['created_at']; ?></td>
                        <td class="column-child"><?php echo $paint['birth_year']; ?></td>
                        <td class="column-phone"><?php echo $paint['mobile']; ?></td>
                        <td class="column-status"><input type="checkbox"
                                                         id="input-status" <?php echo $paint['status'] ? 'checked' : ''; ?>
                                                         disabled></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php
    }
    function delis_get_products()
    {
        $args = wp_parse_args($_POST, array(
            'parent' => 0
        ));
        $status=get_post_status($args['parent']);
        //$selectedProduct = get_post($args['parent']);
        $html = '';
        if (have_rows('flavor_items', $args['parent'])):
            while (have_rows('flavor_items', $args['parent'])) : the_row();
                if (get_row_layout() == 'product_flavor'):
                    //var_dump(get_sub_field('shape_1'));
                    $html .= '<div class="swiper-slide">';
                                        if($status!='draft'):
                                            $html.='<a class="product-link" href="' . get_the_permalink($args['parent']) . '"><img src="' . get_sub_field('image')['url'] . '"
                                         class="img-fluid mx-auto d-block product-float" alt="' . get_sub_field('name') . '"></a>';
                                            else:
                                                $html.='<div class="product-link"><img src="' . get_sub_field('image')['url'] . '"
                                         class="img-fluid mx-auto d-block product-float" alt="' . get_sub_field('name') . '"></div>';
                                         endif;
                                         $html.='<div class="taste-shapes ' . get_sub_field('flavor')->slug . '">
                                         <div class="position-relative w-75 h-75">
                                         <img class="float-shape shape-float" src="' . get_sub_field('shape_1') . '" />
                                         <img class="float-shape shape-float" src="' . get_sub_field('shape_2') . '" />
                                         <img class="float-shape shape-float" src="' . get_template_directory_uri() . '/assets/images/shapes/shape.png" />
                                         </div>
                                         </div>
                                         </div>';
                endif;
            endwhile;
        endif;

//        foreach ($products as $product) {
//            $terms = get_the_terms( $product->ID, 'product-flavor' );
//            $terms = join(', ', wp_list_pluck( $terms , 'slug') );
//            $html.='<div class="swiper-slide"><img src="' . get_the_post_thumbnail_url($product->ID) . '"
//                                         class="img-fluid mx-auto d-block" alt="' . get_the_title($product->post_title) . '">
//                                         <div class="taste-shapes '.$terms.'">
//                                         <img class="float-shape" src="' . get_template_directory_uri() . '/assets/images/shapes/banana/banana-double.png" />
//                                         <img class="float-shape" src="' . get_template_directory_uri() . '/assets/images/shapes/banana/banana.png" />
//                                         <img class="float-shape" src="' . get_template_directory_uri() . '/assets/images/shapes/shape.png" />
//</div>
//                                         </div>';
//        }
        wp_send_json_success($html);
    }

    function delis_send_otp()
    {
        $phone = sanitize_text_field($_POST['phone']);
        // Generate 6-digit OTP
        $otp = $this->random_otp(4);
        //wp_die(var_dump($phone));
        //wp_die(var_dump($this->allowed_numbers($phone)));
        if ($this->allowed_numbers($phone)['allowed']) {
            if (isset($_POST['name'])) {
                $user_exist = $this->delis_get_custom_user_by_mobile($this->allowed_numbers($phone)['phone']);

                if ($user_exist) {
                    wp_send_json_error(array(
                        'message' => 'این شماره قبلا ثبت شده است لطفا وارد شوید.'
                    ));
                }
            }
            // Store OTP with expiration (15 minutes)
            set_transient('phone_auth_otp_' . $this->allowed_numbers($phone)['phone'], $otp, 15 * MINUTE_IN_SECONDS);
            $this->send_sms($this->allowed_numbers($phone)['phone'], $otp);
            // For testing: Return OTP in response
            wp_send_json_success(array(
                'message' => 'کد OTP ارسال شد',
                'phone' => $this->allowed_numbers($phone)['phone'],
                //'debug_otp' => $otp // Remove in production
            ));

        } else {

            wp_send_json_error(array(
                'message' => 'شماره موبایل اشتباه است.'
            ));
        }

    }

    function delis_verify_otp()
    {
        // Verify nonce
        if (!isset($_POST['phone_auth_nonce']) || !wp_verify_nonce($_POST['phone_auth_nonce'], 'verify_otp')) {
            wp_send_json_error(array('message' => 'مشکل امنیتی پیش آمده است.'));
        }
        $otp = sanitize_text_field($_POST['otp']);
        $phone = $this->sanitize($_POST['phone']);
        $name = sanitize_text_field($_POST['name']);

        // Validate OTP
        $stored_otp = get_transient('phone_auth_otp_' . $phone);
        if (!$stored_otp || $stored_otp != $otp) {
            wp_send_json_error(array('message' => 'کد اشتباه است یا منقضی شده است.'));
        }

        // Check if user exists
        //$user_id = $this->get_user_by_phone($phone);

//        if ($user_id) {
//            // Existing user - log them in
//            $result = $this->login_user($user_id);
//        } else {
//            // New user - register them
//            $result = $this->register_user_with_phone($phone, $name);
//        }

        // Clear OTP after successful auth
        delete_transient('phone_auth_otp_' . $phone);

//        if (is_wp_error($result)) {
//            wp_send_json_error(array('message' => $result->get_error_message()));
//        } else {
//            wp_send_json_success(array(
//                'message' => $user_id ? 'با موفقیت وارد شدید!' : 'ثبت نام انجام شد!',
//                'redirect' => home_url('challenges')
//            ));
//        }
        wp_send_json_success(
            array(
                'message' => ''
            )
        );
    }

    function delis_upload_compressed_image()
    {
        if (empty($_FILES['image'])) {
            wp_send_json_error(['message' => 'فایل نرسید']);
        }

        $file = $_FILES['image'];

        $upload_dir = WP_CONTENT_DIR . '/uploads/custom-images/';
        if (!file_exists($upload_dir)) {
            wp_mkdir_p($upload_dir);
        }

//        if (!is_writable($upload_dir)) {
//            wp_send_json_error(['message' => 'فولدر دسترسی نوشتن ندارد']);
//        }

        if (!is_uploaded_file($file['tmp_name'])) {
            wp_send_json_error(['message' => 'فایل آپلود معتبر نیست']);
        }

        /* =========================
           🔴 تشخیص امن پسوند فایل
           ========================= */

        $ext = pathinfo($file['name'], PATHINFO_EXTENSION);

        if (!$ext && !empty($file['type'])) {
            $mime_map = [
                'image/jpeg' => 'jpg',
                'image/jpg' => 'jpg',
                'image/png' => 'png',
                'image/webp' => 'webp',
            ];
            $ext = $mime_map[$file['type']] ?? 'jpg';
        }

        $ext = strtolower($ext);

        $allowed = ['jpg', 'jpeg', 'png', 'webp'];
        if (!in_array($ext, $allowed)) {
            wp_send_json_error(['message' => 'فرمت فایل مجاز نیست']);
        }

        /* ========================= */

        $filename = uniqid('img_', true) . '.' . $ext;
        $target = $upload_dir . $filename;

        if (!move_uploaded_file($file['tmp_name'], $target)) {
            wp_send_json_error([
                'message' => 'ذخیره فایل ناموفق بود',
                'php_error' => error_get_last()
            ]);
        }

        wp_send_json_success([
            'message' => 'آپلود موفق بود',
            'path' => $target,
            'url' => content_url('/uploads/custom-images/' . $filename)
        ]);
    }


    function send_sms($phone, $otp)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://sms.soit.ir/api.php',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode(array('phonenumber' => $phone, 'message' => 'کد ورود:' . $otp)),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: text/plain',
                'Authorization: Basic ' . base64_encode("solico:V`@wL2)Yt9?hv6{E")
            ),
        ));
        $response = curl_exec($curl);

        curl_close($curl);
        //echo $response;
    }
    function send_success_sms($phone, $otp)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://sms.soit.ir/api.php',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode(array('phonenumber' => $phone, 'message' => 'کاربر گرامی شما با شماره ' . $otp.' در قرعه کشی شرکت کرده اید.')),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: text/plain',
                'Authorization: Basic ' . base64_encode("solico:V`@wL2)Yt9?hv6{E")
            ),
        ));
        $response = curl_exec($curl);

        curl_close($curl);
        //echo $response;
    }
    function delis_get_custom_user_by_mobile($mobile)
    {
        global $wpdb;

        $table_name = $wpdb->prefix . 'custom_users_paint';

        // تمیز کردن ورودی
        $mobile = sanitize_text_field($mobile);

        // کوئری امن
        $result = $wpdb->get_row(
            $wpdb->prepare(
                "SELECT * FROM {$table_name} WHERE mobile = %s LIMIT 1",
                $mobile
            ),
            ARRAY_A
        );

        return $result; // اگر پیدا نشه null برمیگردونه
    }

    public function allowed_numbers($data)
    {
        $newphone = $this->sanitize($data);
        return array(
            'phone' => $newphone,
            'allowed' => preg_match("/((0?9)|(\+?989))((14)|(13)|(12)|(19)|(18)|(17)|(15)|(16)|(11)|(10)|(90)|(91)|(92)|(93)|(94)|(95)|(96)|(32)|(30)|(33)|(35)|(36)|(37)|(38)|(39)|(00)|(01)|(02)|(03)|(04)|(05)|(41)|(20)|(21)|(22)|(23)|(31)|(34)|(9910)|(9911)|(9913)|(9914)|(9999)|(999)|(990)|(9810)|(9811)|(9812)|(9813)|(9814)|(9815)|(9816)|(9817)|(998))\W?\d{3}\W?\d{4}/", '98' . $newphone)
        );
    }

    function random_otp($digits)
    {
        $otp = '';
        for ($i = 0; $i < $digits; $i++) {
            $char = strval(rand(0, 9));
            $otp .= $char;
        }
        return $otp;
    }

    public function sanitize($phone)
    {
        $new_phone = false;
        $justNums = preg_replace(["/^\+98/", "/^0098/", "/^98/", "/[^0-9]/"], [
            '',
            '',
            '',
            ''
        ], $phone);
        if (strlen($justNums) == 11) {
            $justNums = preg_replace("/^0/", '', $justNums);
        }
        if (strlen($justNums) == 10 && substr($justNums, 0, 1) === '9') {
            $new_phone = $justNums;
        }

        return $new_phone;
    }

    function delis_get_all_custom_users( $args = [] ) {
        global $wpdb;

        $table_name = $wpdb->prefix . 'custom_users_paint';

        // تنظیمات پیش‌فرض
        $defaults = [
            'limit'  => 0,          // 0 = بدون محدودیت
            'offset' => 0,
            'order'  => 'DESC',
            'orderby'=> 'created_at',
        ];

        $args = wp_parse_args( $args, $defaults );

        // اعتبارسنجی order
        $order = strtoupper( $args['order'] ) === 'ASC' ? 'ASC' : 'DESC';

        // ستون‌های مجاز برای ORDER BY
        $allowed_orderby = [
            'id',
            'full_name',
            'birth_year',
            'mobile',
            'created_at',
        ];

        $orderby = in_array( $args['orderby'], $allowed_orderby, true )
            ? $args['orderby']
            : 'created_at';

        $sql = "SELECT * FROM {$table_name} ORDER BY {$orderby} {$order}";

        if ( $args['limit'] > 0 ) {
            $sql .= $wpdb->prepare(
                " LIMIT %d OFFSET %d",
                intval( $args['limit'] ),
                intval( $args['offset'] )
            );
        }

        return $wpdb->get_results( $sql, ARRAY_A );
    }
    function delis_add_paint()
    {
        $args=wp_parse_args($_POST, array(

        ));
        $this->delis_insert_or_update_user_by_mobile(array(
            'mobile'=>$args['mobile'],
            'full_name'=>$args['name'],
            'birth_year'=>$args['birthdate'],
            'image_url'=>$args['image']
        ));

        wp_send_json_success([
           'message'=>'با موفقیت ثبت شد.'
        ]);
    }
    function delis_insert_or_update_user_by_mobile($data)
    {
        global $wpdb;

        $table_name = $wpdb->prefix . 'custom_users_paint';

        // تمیزسازی داده‌ها
        $mobile = sanitize_text_field($data['mobile'] ?? '');
        $full_name = sanitize_text_field($data['full_name'] ?? '');
        $birth_year = intval($data['birth_year'] ?? null);
        $image_url = esc_url($data['image_url'] ?? '');

        if (empty($mobile)) {
            return new WP_Error('no_mobile', 'شماره موبایل الزامی است');
        }

        // بررسی وجود کاربر
        $existing_user = $wpdb->get_row(
            $wpdb->prepare(
                "SELECT id FROM {$table_name} WHERE mobile = %s LIMIT 1",
                $mobile
            )
        );

        // اگر وجود داشت → فقط عکس آپدیت شود
        if ($existing_user) {

            $updated = $wpdb->update(
                $table_name,
                [
                    'image_url' => $image_url,
                ],
                [
                    'mobile' => $mobile,
                ],
                ['%s'],
                ['%s']
            );

            return [
                'status' => 'updated',
                'id' => $existing_user->id,
                'result' => $updated,
            ];
        }

        // اگر وجود نداشت → درج کاربر جدید
        $inserted = $wpdb->insert(
            $table_name,
            [
                'full_name' => $full_name,
                'birth_year' => $birth_year,
                'mobile' => $mobile,
                'image_url' => $image_url,
                'status' => 1,
            ],
            ['%s', '%d', '%s', '%s', '%d']
        );

        if (!$inserted) {
            return new WP_Error('db_error', 'خطا در ذخیره اطلاعات');
        }

        return [
            'status' => 'inserted',
            'id' => $wpdb->insert_id,
        ];
    }

    function delis_create_user_paint_table()
    {
        global $wpdb;

        $table_name = $wpdb->prefix . 'custom_users_paint';
        $charset_collate = $wpdb->get_charset_collate();

        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

        $sql = "CREATE TABLE $table_name (
        id BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
        full_name VARCHAR(255) NOT NULL,
        birth_year SMALLINT(4) NULL,
        mobile VARCHAR(20) NOT NULL,
        image_url TEXT NULL,
        status TINYINT(1) DEFAULT 1,
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
        updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        PRIMARY KEY  (id),
        UNIQUE KEY mobile (mobile)
    ) $charset_collate;";

        dbDelta($sql);
    }
}