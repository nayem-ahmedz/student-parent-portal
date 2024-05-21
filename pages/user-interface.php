<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student-Parent Portal</title>
    <link rel="stylesheet" href="../styles.css">
    <link rel="stylesheet" href="../assets/user-interface.css">
    <script src="https://kit.fontawesome.com/e54598ab59.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php include('../includes/header-nav.php'); ?>
    <section>
        <article class="u-i">
            <div id="user-nav">
                <p id="user-name" style="display: inline-block; margin: 5px;">user.name</p> 
                <i class="fa-solid fa-angle-down" onclick="hideUserNav()"></i>
                <div class="user-nav-content" id="user-nav-x">
                    <button type="button">Edit Profile</button>
                    <button type="button">Setting</button>
                    <button type="button">Sign out</button>
                </div>
            </div>
        </article>
        <article class="user-interface">
            <div class="ui-left" id="ui-LEFT">
                <p style="text-align: right; margin: 0;">
                    <button onclick="closePanel()" id="side-panel-x">&times;</button>
                </p>
                <div class="ui-image"></div>
                <p id="ui-username">user.name</p>
                <button onclick="myFun(1, event)" class="tab-name ui-active">Dashboard</button>
                <button onclick="myFun(2, event)" class="tab-name">Result</button>
                <button onclick="myFun(3, event)" class="tab-name">University Fees</button>
                <button onclick="myFun(4, event)" class="tab-name">Academics</button>
                <button onclick="myFun(5, event)" class="tab-name">Others</button>
            </div>
            <div class="ui-right">
                <button type="button" id="side-panel" onclick="showPanel()">&#9776;</button>
                <div class="tabs" id="t1" style="display: block;">
                    <div id="user-snippet">
                        <div id="user-pp-image"></div>
                        <div class="user-info">
                            <p>user.name</p>
                            <p>user.id</p>
                        </div>
                        <div class="user-details">
                            <table class="basic-table">
                                <tr>
                                    <th>Name :</th>
                                    <td>user.name</td>
                                </tr>
                                <tr>
                                    <th>Student ID :</th>
                                    <td>user.id</td>
                                </tr>
                                <tr>
                                    <th>Father's Name :</th>
                                    <td>father.name</td>
                                </tr>
                                <tr>
                                    <th>Mother's Name :</th>
                                    <td>mother.name</td>
                                </tr>
                                <tr>
                                    <th>Address :</th>
                                    <td>user.address</td>
                                </tr>
                                <tr>
                                    <th>others :</th>
                                    <td>others.info</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tabs last" id="t2">
                    <h2>Click on the button below to view Results</h2>
                    <button type="button">View Result</button>
                </div>
                <div class="tabs last" id="t3">
                    <h2>Click on the button below to tract university fees</h2>
                    <button type="button">View Result</button>
                </div>
                <div class="tabs last" id="t4">
                    <h3>This is tabs 4</h3>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam voluptatem aperiam molestiae repellendus, recusandae ipsa nihil, quos quo officiis exercitationem quisquam nulla earum minus necessitatibus eligendi tenetur sed sapiente quasi quibusdam quis, consequuntur natus. Iure sapiente ipsam eos accusamus corporis tenetur mollitia, optio maiores necessitatibus corrupti ducimus, sed quia hic.
                </div>
                <div class="tabs last" id="t5">
                    <h3>This is tabs 5</h3>
                    Lorem ipsum dolor Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil laborum nobis corporis, non ducimus excepturi, obcaecati sequi quis quod magnam neque. Ea repellat nihil, pariatur iste enim magnam necessitatibus numquam, nesciunt eius quos velit aspernatur maxime voluptates quisquam quis placeat. Vitae atque harum suscipit hic aliquid velit cumque aliquam autem! sit amet consectetur adipisicing elit. Magnam voluptatem aperiam molestiae repellendus, recusandae ipsa nihil, quos quo officiis exercitationem quisquam nulla earum minus necessitatibus eligendi tenetur sed sapiente quasi quibusdam quis, consequuntur natus. Iure sapiente ipsam eos accusamus corporis tenetur mollitia, optio maiores necessitatibus corrupti ducimus, sed quia hic.
                </div>
            </div>
        </article>
    </section>
    <?php include('../includes/footer.php'); ?>
    <script src="../script.js"></script>
    <script src="../assets/user-interface.js"></script>
</body>
</html>