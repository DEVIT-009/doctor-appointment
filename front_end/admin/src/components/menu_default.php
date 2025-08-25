<?php
$menuItems = [
    [
        "title" => "Main"
    ],
    [
        "page" => "default&dashboards",
        "icon" => "fa-dashboard",
        "label" => "Dashboard"
    ],
    [
        "page" => "default&doctors",
        "icon" => "fa-user-md",
        "label" => "Doctors"
    ],
    [
        "page" => "default&patients",
        "icon" => "fa-wheelchair",
        "label" => "Patients"
    ],
    [
        "page" => "default&appointments",
        "icon" => "fa-calendar",
        "label" => "Appointments"
    ],
    [
        "page" => "default&schedule",
        "icon" => "fa-calendar-check-o",
        "label" => "Doctor Schedule"
    ],
    [
        "page" => "default&departments",
        "icon" => "fa-hospital-o",
        "label" => "Departments"
    ],
    [
        "icon" => "fa-user",
        "label" => "Employees",
        "subitems" => [
            [
                "page" => "default&employees",
                "label" => "Employees List"
            ],
            [
                "page" => "default&leaves",
                "label" => "Leaves Request"
            ],
            [
                "page" => "default&holidays",
                "label" => "Holidays"
            ],
            [
                "page" => "default&attendance",
                "label" => "Attendances"
            ],
        ]
    ],
    [
        "icon" => "fa-money",
        "label" => "Accounts",
        "subitems" => [
            [
                "page" => "default&invoices",
                "label" => "Invoices"
            ],
            [
                "page" => "default&payments",
                "label" => "Payments"
            ],
            [
                "page" => "default&expenses",
                "label" => "Expenses"
            ],
            [
                "page" => "default&taxes",
                "label" => "Taxes"
            ],
            [
                "page" => "default&provident_fund",
                "label" => "Provident fund"
            ],
        ]
    ],
    [
        "icon" => "fa-book",
        "label" => "Payroll",
        "subitems" => [
            [
                "page" => "default&salary",
                "label" => "Employee salary"
            ],
            [
                "page" => "default&salary_view",
                "label" => "Salary view"
            ],
        ]
    ],
    [
        "page" => "conversation&chat",
        "icon" => "fa-comments",
        "label" => "Chat"
    ],
    [
        "icon" => "fa-video-camera camera",
        "label" => "Calls",
        "subitems" => [
            [
                "page" => "conversation&voice_call",
                "label" => "Voice Call"
            ],
            [
                "page" => "conversation&video_call",
                "label" => "Video Call"
            ],
            [
                "page" => "conversation&video_call",
                "label" => "Incoming Call"
            ],
        ]
    ],
    [
        "icon" => "fa-envelope",
        "label" => "Email",
        "subitems" => [
            [
                "page" => "mail&compose",
                "label" => "Compose Mail"
            ],
            [
                "page" => "mail&inbox",
                "label" => "Inbox"
            ],
            [
                "page" => "mail&mail_view",
                "label" => "Mail View"
            ],
        ]
    ],
    [
        "icon" => "fa-commenting-o",
        "label" => "Blog",
        "subitems" => [
            [
                "page" => "default&blog",
                "label" => "Blog"
            ],
            [
                "page" => "default&blog_details",
                "label" => "Blog View"
            ],
            [
                "page" => "default&add_blog",
                "label" => "Add Blog"
            ],
            [
                "page" => "default&edit_blog",
                "label" => "Edit Blog"
            ],
        ]
    ],
    [
        "page" => "default&assets",
        "icon" => "fa-cube",
        "label" => "Assets"
    ],
    [
        "page" => "default&activities",
        "icon" => "fa-bell-o",
        "label" => "Activities"
    ],
    [
        "icon" => "fa-flag-o",
        "label" => "Reports",
        "subitems" => [
            [
                "page" => "default&expense_reports",
                "label" => "Expense Report"
            ],
            [
                "page" => "default&invoice_reports",
                "label" => "Invoice Report"
            ],
        ]
    ],
    [
        "page" => "setting&settings",
        "icon" => "fa-cog",
        "label" => "Settings"
    ],
    [
        "title" => "UI Elements"
    ],
    [
        "icon" => "fa-laptop",
        "label" => "Components",
        "subitems" => [
            [
                "page" => "default&uikit",
                "label" => "UI Kit"
            ],
            [
                "page" => "default&typography",
                "label" => "Typographies"
            ],
            [
                "page" => "default&tabs",
                "label" => "Tabs"
            ],
        ]
    ],
    [
        "icon" => "fa-edit",
        "label" => "Forms",
        "subitems" => [
            [
                "page" => "default&form_basic_inputs",
                "label" => "Basic Inputs"
            ],
            [
                "page" => "default&typography",
                "label" => "Input Groups"
            ],
            [
                "page" => "default&tabs",
                "label" => "Horizontal Form"
            ],
        ]
    ],
    [
        "icon" => "fa-table",
        "label" => "Tables",
        "subitems" => [
            [
                "page" => "default&tables_basic",
                "label" => "Basic Tables"
            ],
            [
                "page" => "default&tables_datatables",
                "label" => "Data Table"
            ],
        ]
    ],
    [
        "page" => "default&calendar",
        "icon" => "fa-calendar",
        "label" => "Calendar"
    ],
    [
        "title" => "Extras"
    ],
    [
        "icon" => "fa-columns",
        "label" => "Pages",
        "subitems" => [
            [
                "page" => "auth&login",
                "label" => "Login"
            ],
            [
                "page" => "auth&register",
                "label" => "Register"
            ],
            [
                "page" => "auth&forgot_password",
                "label" => "Forgot Password"
            ],
            [
                "page" => "auth&change_password2",
                "label" => "Change Password"
            ],
            [
                "page" => "auth&lock_screen",
                "label" => "Lock Screen"
            ],
            [
                "page" => "default&profile",
                "label" => "Profile"
            ],
            [
                "page" => "default&gallery",
                "label" => "Gallery"
            ],
            [
                "page" => "error&error_404",
                "label" => "404 Error"
            ],
            [
                "page" => "error&error_500",
                "label" => "500 Error"
            ],
            [
                "page" => "error&blank_page",
                "label" => "Blank Page"
            ],
        ]
    ],
];
?>
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <?php foreach ($menuItems as $item): ?>
                    <?php if (isset($item['title'])): ?>
                        <li class="menu-title"><?php echo $item['title']; ?></li>
                    <?php elseif (isset($item['subitems'])): ?>
                        <li class="submenu">
                            <a href="#">
                                <i class="fa <?php echo $item['icon']; ?>"></i>
                                <span><?php echo $item['label']; ?></span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul style="display: none;">
                                <?php foreach ($item['subitems'] as $sub): ?>
                                    <li>
                                        <?php if (isset($sub['page'])): ?>
                                            <a href="index.php?page=<?php echo $sub['page']; ?>"><?php echo $sub['label']; ?></a>
                                        <?php else: ?>
                                            <a href="<?php echo $sub['href']; ?>"><?php echo $sub['label']; ?></a>
                                        <?php endif; ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </li>
                    <?php else: ?>
                        <li class="<?php echo (isset($_GET['page']) && $_GET['page'] == $item['page']) || (!isset($_GET['page']) && $item['page'] == 'dashboards') ? 'active' : '' ?>">
                            <a href="index.php?page=<?php echo $item['page']; ?>">
                                <i class="fa <?php echo $item['icon']; ?>"></i>
                                <span><?php echo $item['label']; ?></span>
                            </a>
                        </li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>