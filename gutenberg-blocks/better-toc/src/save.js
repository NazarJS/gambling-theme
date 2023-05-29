/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#useblockprops
 */
import { useBlockProps } from '@wordpress/block-editor';

/**
 * The save function defines the way in which the different attributes should
 * be combined into the final markup, which is then serialized by the block
 * editor into `post_content`.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#save
 *
 * @return {WPElement} Element to render.
 */
export default function save({attributes}) {
	const CustomTag = `${attributes.ListType}`; 

	return (
		
		<div   { ...useBlockProps.save() }>
	<div class="container">
    

    <div class="main-tabs">
        <div class="container">
            <div class="main-tabs__wrapper">
                

                <div class="main-tabs__body">
                    <div class="main-tabs__block main-tabs__block-active">
                        <div class="main-tabs__title">Page Navigation:</div>

                        <nav class="main-tabs__container">
						<CustomTag className={attributes.ListType} 
							dangerouslySetInnerHTML={{ __html: attributes.tocString }}>
							
						</CustomTag>
                        </nav>
                    </div>


                </div>
            </div>
        </div>
    </div>


    </div></div>
		
	);
}
