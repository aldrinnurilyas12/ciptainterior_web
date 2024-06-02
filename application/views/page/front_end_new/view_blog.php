<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
</head>

<body>
    <div class="container-content">
        <?php foreach ($blog_content->result() as $blg) : ?>
            <div class="blog-article-content">

                <div style="display:block; justify-content:center;margin:0 auto;" class="content-body">
                    <h1 style="font-family: Inter, sans-serif;text-align:center;"><?php echo $blg->nama_artikel; ?></h1>

                    <div style="display: flex;margin:0 auto;justify-content:center;margin-bottom:15px;margin-top:15px;" class="img-content">
                        <img style="width: 80%; height:330px;" src="<?php echo base_url() . '/blog_media/' . $blg->foto; ?>" alt="">
                    </div>

                    <div class="content-text">
                        <p style="margin-top: 10px;margin-bottom:10px; color:black;text-align:center;font-family:Inter, sans-serif;">
                            <span style="color: black;font-weight:bold;">By
                                Cipta
                                Interior</span>&nbsp; | &nbsp;
                            <?php echo $blg->article_date; ?>
                        </p>
                        <p style="color: black;font-family:roboto;">
                            <?php echo $blg->isi_artikel; ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</body>

<style>
    .content-text {
        width: 100%;

        display: block;
    }

    .container-content {
        padding: 60px;
    }



    @media only screen and (max-width:400px) {

        .container-content {
            padding: 10px;
        }

        .blog-article-content {
            width: 100%;
        }

        .content-body {
            width: 100%;
        }
    }
</style>

</html>