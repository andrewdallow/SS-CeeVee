<?php

/**
 * Description of CVPage
 *
 * @author Andrew Dallow
 */
class CVPage extends Page {
    private static $db = array(
        'Heading' => 'Varchar',
        'Biography' => 'HTMLText',
        'LinkedInLink' => 'Text',
        'TwitterLink' => 'Text',
        'FacebookLink' => 'Text',
        'GoogleLink' => 'Text',
        'InstagramLink' => 'Text',
        'SkypeLink' => 'Text',
        'DribbbleLink' => 'Text',
        'Name' => 'Varchar',
        'PostalAddress' => 'Varchar',
        'PostalCity' => 'Varchar',
        'PostalCode' => 'Varchar',
        'PostalRegion' => 'Varchar',
        'PostalCountry' => 'Varchar',
        'PhoneContact' => 'Varchar',
        'Email' => 'Text',
        'SkillsIntro' => 'HTMLText',
        'ContactIntro' => 'Text',
        'PortfolioTitle' => 'Text'
    );
    private static $has_one = array(
        'BannerImage' => 'Image',
        'Portrait' => 'Image',
        'Resume' => 'File',
        'TestimonialBanner' => 'Image'
    );
    
     private static $has_many = array(
        'Education' => 'EducationItem',
        'Work' => 'WorkItem',
        'Skills' => 'SkillItem',
        'Testimonials' => 'Testimonial',
        'Portfolio' => 'PortfolioItem'
    );
    
    public function getCMSFields() {
        $fields = parent::getCMSFields();
        
        /**********************************************************************
         * Banner Section
         **********************************************************************/        
        
         $fields->addFieldToTab('Root.Main', 
                 TextField::create('Heading', 'Heading'), 'Content'
                 );
        
        $fields->addFieldsToTab('Root.Main', array(
            $banner = UploadField::create('BannerImage')
        ), 'Content');
        $banner->getValidator()->setAllowedExtensions(
                array('png', 'gif', 'jpg', 'jpeg')
        );       
          
        
        $fields->addFieldsToTab('Root.Social', array(
            TextField::create('FacebookLink', 'Facebook'),
            TextField::create('TwitterLink', 'Twitter'),
            TextField::create('GoogleLink', 'Google'),
            TextField::create('LinkedInLink', 'LinkedIn'),
            TextField::create('InstagramLink', 'Instagram'),
            TextField::create('DribbbleLink', 'Dribbble'),
            TextField::create('SkypeLink', 'Skype')
        ));
            
        
        
        /**********************************************************************
         * About Me Section
         **********************************************************************/ 
        
        $fields->addFieldsToTab('Root.AboutMe', array(
            HtmlEditorField::create('Biography', 'Short Biography'),
            FieldGroup::create(
                    TextField::create('Name', 'Full Name'),
                    TextField::create('PostalAddress', 'Address'),
                    TextField::create('PostalCity', 'City'),
                    TextField::create('PostalRegion', 'Region'),
                    TextField::create('PostalCode', 'Postcode'),
                    CountryDropdownField::create('PostalCountry', 'Country')
            )->setTitle('Postal Address'),
            TextField::create('PhoneContact', 'Telephone Number'),
            EmailField::create('Email', 'Email Address')
        ));
        
        $fields->addFieldsToTab('Root.AboutMe', array(
            $portrait = UploadField::create('Portrait')
        ));
        $portrait->getValidator()->setAllowedExtensions(
                array('png', 'gif', 'jpg', 'jpeg')
        );
        
        $fields->addFieldsToTab('Root.AboutMe', array(
            $resume = UploadField::create('Resume')
        ));
        $resume->getValidator()->setAllowedExtensions(
                array('pdf')
        );
        
        /**********************************************************************
         * Education Section
         **********************************************************************/ 
        $fields->addFieldToTab('Root.Education', GridField::create(
               'Education',
               'EducationItem',
               $this->Education(),
               GridFieldConfig_RecordEditor::create()
        ));
         
        /**********************************************************************
         * Work Section
         **********************************************************************/ 
        $fields->addFieldToTab('Root.Work', GridField::create(
               'Work',
               'WorkItem',
               $this->Work(),
               GridFieldConfig_RecordEditor::create()
        ));
        
        /**********************************************************************
        * Skills Section
        **********************************************************************/ 
        $fields->addFieldToTab('Root.Skills', 
                HtmlEditorField::create('SkillsIntro', 'Skills Introduction')
            );
        
        $fields->addFieldToTab('Root.Skills', GridField::create(
               'Slills',
               'SkillItem',
               $this->Skills(),
               GridFieldConfig_RecordEditor::create()
        ));
        
        /**********************************************************************
        * Contact Section
        **********************************************************************/ 
        $fields->addFieldToTab('Root.Contact', 
                TextareaField::create('ContactIntro', 'Contact Introduction')
            );
        
        
        /**********************************************************************
         * Testimonial Section
         **********************************************************************/ 
        $fields->addFieldsToTab('Root.Testimonials', array(
            $TestimonialImage = UploadField::create('TestimonialBanner', 
                    'Background Image')
        ));
        $TestimonialImage->getValidator()->setAllowedExtensions(
                array('png', 'gif', 'jpg', 'jpeg')
        ); 
        
        $fields->addFieldToTab('Root.Testimonials', GridField::create(
               'Testimonials',
               'Testimonial',
               $this->Testimonials(),
               GridFieldConfig_RecordEditor::create()
        ));
        
        
        
        /**********************************************************************
         * Portfolio Section
         **********************************************************************/
        $fields->addFieldToTab('Root.Portfolio', 
                TextField::create('PortfolioTitle')
            );
        
        $fields->addFieldToTab('Root.Portfolio', GridField::create(
               'Portfolio',
               'PortfolioItem',
               $this->Portfolio(),
               GridFieldConfig_RecordEditor::create()
        ));
        
        
        return $fields;
    }  
}

class CVPage_Controller extends Page_Controller {
    private static $allowed_actions = array('submit');
    
    public function getEducation($count = 3) {
        return EducationItem::get()
                ->sort('QualificationDate', 'DESC')
                ->limit($count);
    }
    public function getWork($count = 3) {
        return WorkItem::get()
                ->sort('StartDate', 'DESC')
                ->limit($count);
    }
    public function getSkills($count = 3) {
        return SkillItem::get()
                ->sort('Rating', 'DESC')
                ->limit($count);
    }
    
    public function getPortfolio($count = 8) {
        return PortfolioItem::get()
                ->sort('Created', 'ASC')
                ->limit($count);
    }
    
    public function getTestimonials($count = 3) {
        return Testimonial::get()
                ->limit($count);
    }
    
    public function submit($data) { 
        
        
        $name = trim(stripslashes(
                filter_input(INPUT_POST,'contactName')));
        $address= trim(stripslashes(
                filter_input(INPUT_POST,'contactEmail')));
        $subject = trim(stripslashes(
                filter_input(INPUT_POST,'contactSubject')));
        $contact_message = trim(stripslashes(
                filter_input(INPUT_POST,'contactMessage')));

        // Check Name
        if (strlen($name) < 2) {
                $error['name'] = "Please enter your name.";
        }
        // Check Email
        if (!preg_match('/^[a-z0-9&\'\.\-_\+]+@[a-z0-9\-]+\.([a-z0-9\-]+\.)*+[a-z]{2}/is', $address)) {
                $error['email'] = "Please enter a valid email address.";
        }
        // Check Message
        if (strlen($contact_message) < 15) {
                $error['message'] = "Please enter your message. It should have "
                        . "at least 15 characters.";
        }
        // Subject
        if ($subject == '') { $subject = "Contact Form Submission"; }
        

        
        if (!isset($error)) {
            $email = new Email();
            $email->setTo($this->Email); 
            $email->setFrom($address); 
            $email->setSubject($subject); 

            $messageBody = " 
                <p><strong>Name:</strong> {$name}</p> 
                <p><strong>Message:</strong><br> {$contact_message}</p> 
            "; 
            $email->setBody($messageBody); 
            $email->send();
            return 'OK';
        } else {
            $response = (isset($error['name'])) ? $error['name'] 
                    . "<br /> \n" : null;
            $response .= (isset($error['email'])) ? $error['email'] 
                    . "<br /> \n" : null;
            $response .= (isset($error['message'])) ? $error['message'] 
                    . "<br />" : null;

            echo $response;
        }
        
    }
    
}
