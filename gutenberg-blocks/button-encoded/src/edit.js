/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-i18n/
 */
import {__} from '@wordpress/i18n';

/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#useblockprops
 */
import {useBlockProps, BlockControls} from '@wordpress/block-editor';
import { DropdownMenu } from '@wordpress/components';

import {
	TextControl,
	ToolbarGroup,
	Button,
	ColorPalette,
	ColorIndicator,
	

} from '@wordpress/components';
/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * Those files can contain any CSS code that gets applied to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */
import './editor.scss';
import {useState} from '@wordpress/element';

/**
 * The edit function describes the structure of your block in the context of the
 * editor. This represents what the editor will render when the block is used.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#edit
 *
 * @return {WPElement} Element to render.
 */
export default function Edit({attributes, setAttributes}) {

	const [anchor, setAnchor] = useState(attributes.anchor);
	const [url, setUrl] = useState(attributes.url);
	const [previewStatus, setPreview] = useState(attributes.preview);
	const [btnStyle, setStyleBtnColor] = useState(attributes.btnStyle);

	function showButton(props,anchor) {
		if(props == 'android') {
			return (<button type="button" class="ui-btn__icon ui-btn__android">
			
			<span class="ui-btn__name">
				Download

				<span class="ui-btn__subtitle">
					for Android
				</span>
			</span>
					</button>)
		} else if (props == 'ios') {
			return (<button type="button" class="ui-btn__icon ui-btn__ios">
			
						<span class="ui-btn__name">
							Download

							<span class="ui-btn__subtitle">
								for ios
							</span>
						</span>
					</button>)
		} else if (props == 'register') {		
			return(
				<button type="button" class="ui-btn ui-btn__register">
					{anchor}
				</button>	
			)
		} else if (props == 'download') {
			return(
				<button type="button" class="ui-btn ui-btn__download">
					{anchor}
				</button>	
			)
		}
	} 


	const ChangeView = () => {
		setPreview((prevPreviewStatus) => !prevPreviewStatus);
		setAttributes({preview: !previewStatus});
	};
	setAttributes({btnStyle: btnStyle});
	setAttributes({anchor: anchor});
	setAttributes({url: url});
	return (
		<div {...useBlockProps()}>
			<BlockControls>
				<ToolbarGroup style={{display: "flex", alignItems: "center"}}>
					<Button onClick={ChangeView}>ChangeView</Button>
				</ToolbarGroup>

			
				<DropdownMenu
						label="Select a direction"
						controls={ [
							{
								title: 'register',
								onClick: ()=>setStyleBtnColor('register'),
								
							},
							{
								title: 'download',
								onClick: ()=>setStyleBtnColor('download'),
							},
							{
								title: 'android',
								onClick: ()=>setStyleBtnColor('android'),
							},
							{
								title: 'ios',
								onClick: ()=>setStyleBtnColor('ios'),
							},
							
						] }
					/>
			</BlockControls>
			<div className="special-section-wrapper">

				{!previewStatus && (
					<>
						<div className="special-section-wrapper__heading">
							Button
						</div>
						<div className={'encoded-buttons'}>
							<TextControl
								value={url}
								placeholder={'url'}
								onChange={(value) => setUrl(value)}
							/>
							<TextControl
								placeholder={'anchor'}
								value={anchor}
								onChange={(value) => setAnchor(value)}
							/>

						</div>
					</>
				)}
				{previewStatus && (
					showButton(btnStyle,anchor)
				)}

			</div>
		</div>
	);
}
