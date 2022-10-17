<?php
  class recreate_database {
    private $db;
    
    function __construct($conn) {
      $this->db = $conn;
    }
  
    public function restore_db() {
      try {
        $sql = "
        TRUNCATE TABLE about_me;

        INSERT INTO `about_me` (`id`, `short_about_me`, `github_lenke`, `mail_lenke`, `linkedin_lenke`, `about_me`, `username`) VALUES
        (1, 'I am a fullstack developer for TulpeshCO.\nI like PHP and I am currently learning .NET 6.', 'https://github.com/KrystianMazurkiewicz', 's354340@oslomet.no', 'https://www.linkedin.com/in/krystian-mazurkiewicz-4b894824b/', 'Hi! I am looking for a company that is great at what they are doing. I would love to work for FjesBuk or InstantKilogram. In the future I would like to go to Mars with a rocket that I will build in CSS and HTML. In the free time I like to write \"about me\" description for real and fake personas. I am currently eating a Kebabpizza, but I also study sometimes at Oslomet University. In the weekends I like to go wild and develop a fully usable demo of a specific website for something. I also like CSS, HTML, PHP and JavaScript! :)', 's2'),
        (2, 'I am a fullstack developer for Tulpesh©.\r\nI like PHP and I am currently learning .NET 6.', 'https://github.com/KrystianMazurkiewicz', 's354340@oslomet.no', 'https://www.linkedin.com/in/krystian-mazurkiewicz-4b894824b/', 'Hi! I am looking for a company that is great at what they are doing. I would love to work for FjesBuk or InstantKilogram. In the future I would like to go to Mars with a rocket that I will build in CSS and HTML. In the free time I like to write \"about me\" description for real and fake personas. I am currently eating a Kebabpizza, but I also study sometimes at Oslomet University. In the weekends I like to go wild and develop a fully usable demo of a specific website for something. I also like CSS, HTML, PHP and JavaScript! :)', 's'),
        (3, 'I am a fullstack developer for TulpeshCO.\r\nI like PHP and I am currently learning .NET 6.', 'https://github.com/KrystianMazurkiewicz', 's354340@oslomet.no', 'https://www.linkedin.com/in/krystian-mazurkiewicz-4b894824b/', 'Hi! I am looking for a company that is great at what they are doing. I would love to work for FjesBuk or InstantKilogram. In the future I would like to go to Mars with a rocket that I will build in CSS and HTML. In the free time I like to write \"about me\" description for real and fake personas. I am currently eating a Kebabpizza, but I also study sometimes at Oslomet University. In the weekends I like to go wild and develop a fully usable demo of a specific website for something. I also like CSS, HTML, PHP and JavaScript! :)', 'c'),
        (4, 'I am a THE Tulpesh.\r\nI like Krystian AKA Krosh because he is great at programming.', 'https://github.com/KrystianMazurkiewicz', 's354340@oslomet.no', 'https://www.linkedin.com/in/krystian-mazurkiewicz-4b894824b/', 'Hi! I run this shit! Hell yeah! If I do not like what you do on this website, guess what, I will remove you from this site >:-) HE HE HE!', 'a');
        


        TRUNCATE TABLE `internships`;
        
        INSERT INTO `internships` (`id`, `co_name`, `post_title`, `post_description`, `hashtags`, `ppl_applied`, `co_website`, `status`) VALUES
        (1, 'Sopra Steria', 'We Are Looking For HTML And CSS Developers For Our Job ', '', '', 22, 'https://www.soprasteria.no/', 'published'),
        (2, 'Facebook', 'We are looking for people with knowledge in cookies.', 'We are looking for both people that can eat a lot of cookies as well as bake them. We are having a tournament at our office where we our coworkers are going to compete by eating the most cookies in 1 hours. The first one to throw up wins a \"tulling\" medal. \n\nIn addition we will be watching some fun memes on our beloved platform, Fjesbuk.', '', 10, 'https://www.facebook.com/', 'published'),
        (3, 'c', 'Personalized Internet Ads Assessors in Norway (Norwegian Language) (Work-From-Home)', 'TELUS International AI-Data Solutions partners with a diverse and vibrant community to help our customers enhance their AI and machine learning models. The work of our AI Community contributes to improving technology and the digital experiences of many people around the world. Our AI Community works in our proprietary AI training platform handling all data types (text, images, audio, video and geo) across 500+ languages and dialects. We offer flexible work-from-home opportunities for people with passion for languages. The jobs are part-time, and there is no fixed schedule. Whoever you are, wherever you come from, come join our global AI community. www.telusinternational.com', '', 11, 'https://www.oslomet.no/', 'published'),
        (4, 'Oslomet', 'Customer Support Associate - Part Time - Norway', 'Vi tror på en verden der alle biler er felles. Bildeling gir folk mulighet til å komme seg rundt på en smartere og enklere måte, samtidig som det har en positiv innvirkning på miljøet og gjør byene mer levedyktige. Det er denne visjonen som driver oss fremover og inspirerer oss til å tenke enda større.\r\n\r\nSiden november 2021 er Nabobil en del av Getaround. Sammen er vi verdens ledende bildelingsplattform med et fellesskap på mer enn 5 millioner brukere som deler over 11 000 tilkoblede biler i 7 land.\r\n\r\nTeamet vårt er samarbeidende, positivt, nysgjerrig og engasjert. Vi tenker raskt, jobber smart, ler ofte og ser etter likesinnede som kan bli med oss i vårt oppdrag om å forstyrre bileierskap og gjøre byer bedre.', '', 0, 'https://www.oslomet.no/', 'archived'),
        (10, 'Tietoevry', 'We are looking for Tech Graduates to our specialist track in Norway!', 'Tietoevry creates purposeful technology that reinvents the world for good. We are a leading technology company with a strong Nordic heritage and global capabilities. Based on our core values of openness, trust and diversity, we work with our customers to develop digital futures where businesses, societies, and humanity thrive. Whether you are a strategist, coder, analyst, or a future-enthusiast, you will find your place here.\r\n\r\n\r\nWe are now recruiting graduates for the fall of 2023 in Norway! Become a part of our team consisting of 24,000 experts globally, helping businesses and societies meet their full potential – while you are also reaching yours.', '', 0, '', 'reviewed'),
        (14, 'Oslomet', 'Doktorgradsstipendiat innenfor arbeidstid, helse og jobbutførelse i helse- og omsorgsyrker', 'OsloMet – storbyuniversitetet er landets tredje største universitet, med over 20 000 studenter og mer enn 2000 ansatte. OsloMet leverer kunnskap og yrkesutøvere samfunnet er avhengig av, og er tett på arbeidslivets behov. OsloMet er et urbant og mangfoldig universitet med internasjonalt preg og et attraktivt studie- og arbeidssted med studiesteder midt i Oslo og på Kjeller ved Lillestrøm. Tilstedeværelsen i hovedstadsregionen gir universitetet gode muligheter til å forstå og høste fordelene av byens varierte befolkningssammensetning.\r\n\r\n\r\nSenter for velferds- og arbeidslivsforskning (SVA) ved OsloMet - storbyuniversitetet består av Arbeidsforskningsinstituttet (AFI), Velferdsforskningsinstituttet NOVA, By- og regionforskningsinstituttet NIBR og Forbruksforskningsinstituttet SIFO.', '', 0, 'https://www.oslomet.no/', 'reviewed'),
        (15, 'Oslomet', 'Rådgiver/seniorrådgiver', 'OsloMet – storbyuniversitetet er landets tredje største universitet, med over 20 000 studenter og mer enn 2000 ansatte. OsloMet leverer kunnskap og yrkesutøvere samfunnet er avhengig av, og er tett på arbeidslivets behov. OsloMet er et urbant og mangfoldig universitet med internasjonalt preg og et attraktivt studie- og arbeidssted med studiesteder midt i Oslo og på Kjeller ved Lillestrøm. Tilstedeværelsen i hovedstadsregionen gir universitetet gode muligheter til å forstå og høste fordelene av byens varierte befolkningssammensetning.', '', 0, 'https://www.oslomet.no/', 'reviewed');



        TRUNCATE TABLE student_has_internship;
        
        
        
        TRUNCATE TABLE tags;
        
        INSERT INTO `tags` (`id`, `name`) VALUES
        (1, 'PHP'),
        (2, 'Java'),
        (3, 'CSS'),
        (4, 'HTML'),
        (5, 'Python'),
        (6, 'C#'),
        (7, 'JavaScript'),
        (8, 'React'),
        (9, 'NodeJS'),
        (10, 'Deno'),
        (11, 'MongoDB'),
        (12, 'MySQL'),
        (13, 'admin'),
        (14, 'organization'),
        (15, 'student');
        ";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return true;
      } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
      }
    }
    
    public function clear_all() {
      try {
        $sql = "
        TRUNCATE TABLE about_me;

        INSERT INTO `about_me` (`id`, `short_about_me`, `github_lenke`, `mail_lenke`, `linkedin_lenke`, `about_me`, `username`) VALUES
        (1, 'I am a fullstack developer for TulpeshCO.\nI like PHP and I am currently learning .NET 6.', 'https://github.com/KrystianMazurkiewicz', 's354340@oslomet.no', 'https://www.linkedin.com/in/krystian-mazurkiewicz-4b894824b/', 'Hi! I am looking for a company that is great at what they are doing. I would love to work for FjesBuk or InstantKilogram. In the future I would like to go to Mars with a rocket that I will build in CSS and HTML. In the free time I like to write \"about me\" description for real and fake personas. I am currently eating a Kebabpizza, but I also study sometimes at Oslomet University. In the weekends I like to go wild and develop a fully usable demo of a specific website for something. I also like CSS, HTML, PHP and JavaScript! :)', 's2'),
        (2, 'I am a fullstack developer for Tulpesh©.\r\nI like PHP and I am currently learning .NET 6.', 'https://github.com/KrystianMazurkiewicz', 's354340@oslomet.no', 'https://www.linkedin.com/in/krystian-mazurkiewicz-4b894824b/', 'Hi! I am looking for a company that is great at what they are doing. I would love to work for FjesBuk or InstantKilogram. In the future I would like to go to Mars with a rocket that I will build in CSS and HTML. In the free time I like to write \"about me\" description for real and fake personas. I am currently eating a Kebabpizza, but I also study sometimes at Oslomet University. In the weekends I like to go wild and develop a fully usable demo of a specific website for something. I also like CSS, HTML, PHP and JavaScript! :)', 's'),
        (3, 'I am a fullstack developer for TulpeshCO.\r\nI like PHP and I am currently learning .NET 6.', 'https://github.com/KrystianMazurkiewicz', 's354340@oslomet.no', 'https://www.linkedin.com/in/krystian-mazurkiewicz-4b894824b/', 'Hi! I am looking for a company that is great at what they are doing. I would love to work for FjesBuk or InstantKilogram. In the future I would like to go to Mars with a rocket that I will build in CSS and HTML. In the free time I like to write \"about me\" description for real and fake personas. I am currently eating a Kebabpizza, but I also study sometimes at Oslomet University. In the weekends I like to go wild and develop a fully usable demo of a specific website for something. I also like CSS, HTML, PHP and JavaScript! :)', 'c'),
        (4, 'I am a THE Tulpesh.\r\nI like Krystian AKA Krosh because he is great at programming.', 'https://github.com/KrystianMazurkiewicz', 's354340@oslomet.no', 'https://www.linkedin.com/in/krystian-mazurkiewicz-4b894824b/', 'Hi! I run this shit! Hell yeah! If I do not like what you do on this website, guess what, I will remove you from this site >:-) HE HE HE!', 'a');



        TRUNCATE TABLE `internships`;
        TRUNCATE TABLE student_has_internship;
        TRUNCATE TABLE tags;
        
        INSERT INTO `tags` (`id`, `name`) VALUES
        (1, 'PHP'),
        (2, 'Java'),
        (3, 'CSS'),
        (4, 'HTML'),
        (5, 'Python'),
        (6, 'C#'),
        (7, 'JavaScript'),
        (8, 'React'),
        (9, 'NodeJS'),
        (10, 'Deno'),
        (11, 'MongoDB'),
        (12, 'MySQL'),
        (13, 'admin'),
        (14, 'organization'),
        (15, 'student');
        ";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return true;
      } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
      }
    }
  }
?>