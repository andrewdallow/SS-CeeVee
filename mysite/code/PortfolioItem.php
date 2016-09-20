<?php

/**
 * Description of PortfolioItem
 *
 * @author Andrew Dallow
 */
class PortfolioItem extends DataObject {
    private static $db = array(
        'Title' => 'Varchar',
        'Subtitle' => 'Varchar',
        'Website' => 'Text',
        'Description' => 'Text',
        'Tags' => 'Text'
    );    
    
    
    private static $has_one = array(
        'CVPage' => 'CVPage',
        'Photo' => 'Image'
    );
    
    private static $summary_fields = array (
        'Photo.CMSThumbnail' => 'Image',
        'Title' => 'Title',
        'Description' => 'Description'
    );
    
    
    public function getCMSFields() {
        $photo = UploadField::create(
                $name = 'Photo', 
                $title = 'Upload a Portfolio Image');
        $photo->getValidator()->setAllowedExtensions(
                array('png', 'gif', 'jpg', 'jpeg')
        );
        
        $photo->setFolderName('portfolioimages');
        
        $field = StringTagField::create(
            'Tags',
            'Tags',
            explode(',', $this->Tags)
         );
        $field->setShouldLazyLoad(true);
        
        return FieldList::create(array(
            $photo,
            TextField::create('Title'),
            TextField::create('Subtitle'),
            TextField::create('Website'),
            TextareaField::create('Description'),
            $field                       
            ));
    }
}
