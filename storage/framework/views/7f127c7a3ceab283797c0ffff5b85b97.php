<!DOCTYPE html>
<html>

<meta http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate, max-age=0">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Expires" content="0">

<head>
    <title>Resume - <?php echo e($name); ?></title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            background: #eef2f5;
            display: flex;
            justify-content: center;
            overflow-y: auto;
        }
        .resume {
            width: 216mm;
            background: #fff;
            box-shadow: 0 4px 20px rgba(0,0,0,0.15);
            display: flex;
            flex-direction: column;
            margin: 60px 0 20px; /* leave space for logout button */
            border-radius: 12px;
            overflow: hidden;
        }
        .header {
            background: linear-gradient(135deg,rgb(167, 204, 233),rgb(150, 187, 226));
            color: #fff;
            padding: 25px 30px;
            display: flex;
            align-items: center;
        }
        .header-left {
            display: flex;
            align-items: center;
        }
        .header img {
            width: 110px;
            height: 110px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 20px;
            border: 3px solid #fff;
        }
        .header h1 { margin: 0; font-size: 28px; font-weight: bold; }
        .header p { margin: 5px 0 0; font-size: 14px; letter-spacing: 1px; }

        .content { display: flex; flex: 1; flex-wrap: wrap; }
        .left, .right { padding: 30px; box-sizing: border-box; }
        .left { width: 35%; background: #f9fbfd; border-right: 1px solid #e0e0e0; }
        .right { width: 65%; }

        h2 {
            font-size: 15px;
            letter-spacing: 2px;
            color: #333;
            margin: 20px 0 10px;
            border-bottom: 2px solidrgb(89, 167, 227);
            padding-bottom: 5px;
        }
        p, li { font-size: 14px; color: #444; line-height: 1.6; }
        ul { padding-left: 20px; }

        /* Collapsible sections */
        .collapsible {
            cursor: pointer;
            background: #f0f4f8;
            padding: 8px 12px;
            border-radius: 6px;
            margin-top: 10px;
            transition: background 0.3s ease;
        }
        .collapsible:hover { background: #dce3eb; }
        .collapsible-content {
            display: none;
            margin-top: 10px;
            animation: fadeIn 0.4s ease-in-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-5px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .contact-item { margin: 5px 0; }
        .contact-item a {
            color: #2d3e50;
            text-decoration: none;
            transition: color 0.3s;
        }
        .contact-item a:hover { color: #4a90e2; }

        @page { size: 216mm 279mm; margin: 20mm; }
        @media print {
            body { background: none; }
            .resume { box-shadow: none; margin: 0; width: 100%; }
            .logout-btn { display: none; }
            .collapsible { background: none; cursor: auto; }
            .collapsible-content { display: block !important; }
        }

        /* Login success popup message*/
        .popup {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background:  rgb(0, 151, 15);
            border: 1px solid rgb(0, 151, 14);
            border-radius: 8px;
            padding: 15px 25px;
            box-shadow: 0 4px 12px rgba(255, 255, 255, 0.2);
            font-size: 16px;
            font-weight: bold;
            z-index: 9999;
            opacity: 1;
            transition: opacity 0.5s ease;
            text-align: center;
            min-width: 250px;
            color: rgb(255, 255, 255); /* ✅ text color changed to white */
        }


    </style>
</head>
<body>
        <!-- Logout button component -->
    <?php echo $__env->make('component.logout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <?php if(session('success')): ?>
        <div id="popup-message" class="popup <?php echo e(session('success')); ?>">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>


    <div class="resume">
        <div class="header">
            <div class="header-left">
                <img src="<?php echo e(asset('images/my_photo.jpg')); ?>" alt="Profile Photo">
                <div>
                    <h1><?php echo e($name); ?></h1>
                    <p><?php echo e($title); ?></p>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="left">
                <h2>PERSONAL PROFILE</h2>
                <p><?php echo e($profile); ?></p>

                <h2>CONTACT</h2>
                <?php $__currentLoopData = $contact; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <p class="contact-item"><a href="mailto:<?php echo e($c); ?>"><?php echo e($c); ?></a></p>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <h2>EDUCATION</h2>
                <p><?php echo nl2br(e($education)); ?></p>
            </div>

            <div class="right">
                <h2>SKILLS</h2>
                <div class="collapsible">Show / Hide Skills</div>
                <div class="collapsible-content">
                    <ul>
                        <?php $__currentLoopData = $skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($s); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>

                <h2>WORK EXPERIENCE</h2>
                <div class="collapsible">Show / Hide Experience</div>
                <div class="collapsible-content">
                    <?php $__currentLoopData = $experience; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <p><strong><?php echo e($exp['company']); ?></strong><br>
                        <em><?php echo e($exp['date']); ?></em></p>
                        <ul>
                            <?php $__currentLoopData = $exp['tasks']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($t); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Collapsible sections
        document.querySelectorAll('.collapsible').forEach(button => {
            button.addEventListener('click', () => {
                const content = button.nextElementSibling;
                content.style.display = content.style.display === 'block' ? 'none' : 'block';
            });
        });
    </script>
</body>
</html>

<script>
    // Prevent going back to resume after logout
    window.history.pushState(null, "", window.location.href);
    window.onpopstate = function () {
        window.location.replace("<?php echo e(route('login')); ?>");
    };
</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        let popup = document.getElementById("popup-message");
        if (popup) {
            setTimeout(() => {
                popup.style.opacity = "0";
                setTimeout(() => popup.remove(), 500); // remove after fade
            }, 3000); // 3 seconds
        }
    });
</script>
<?php /**PATH C:\Users\ASUS\Desktop\Web_Sys_Files\myproject\resources\views/resume.blade.php ENDPATH**/ ?>