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

import {
	TextControl,
	ToolbarGroup,
	Button,
	ColorPalette,
	ColorIndicator
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
	const [btnStyle, setStyleBtnColor] = useState(attributes.btnStyle)


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

				<ToolbarGroup style={{display: "flex", alignItems: "center"}}>
					<ColorIndicator
						colorValue="#fff"
						onClick={()=>setStyleBtnColor('')}
					/>
					<ColorIndicator
						colorValue="#444"
						onClick={()=>setStyleBtnColor('btn1')}
					/>
					<ColorIndicator
						colorValue="#3775dd"
						onClick={()=>setStyleBtnColor('btn2')}
					/>
					<ColorIndicator
						colorValue="#4c8700"
						onClick={()=>setStyleBtnColor('btn3')}
					/>
					<ColorIndicator
						colorValue="#9A68C7"
						onClick={()=>setStyleBtnColor('btn4')}
					/>
					<ColorIndicator
						colorValue="#fdf900"
						onClick={()=>setStyleBtnColor('btn5')}
					/>

				</ToolbarGroup>
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
					<button className={btnStyle} href={url}>
						{anchor}
					</button>
				)}

			</div>
		</div>
	);
}
