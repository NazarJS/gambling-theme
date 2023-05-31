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

import {Icon, more, chevronUp, chevronDown, trash} from '@wordpress/icons';

import {useState,useRef,useEffect} from '@wordpress/element';
import {
	Button,
	TextControl,
	ButtonGroup,
	Panel,
	PanelBody,
	PanelRow,
	RadioControl,
	Toolbar,
	ToolbarGroup
} from '@wordpress/components';
import {__experimentalInputControl as InputControl} from '@wordpress/components';
/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * Those files can contain any CSS code that gets applied to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */
import './editor.scss';

/**
 * The edit function describes the structure of your block in the context of the
 * editor. This represents what the editor will render when the block is used.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#edit
 *
 * @return {WPElement} Element to render.
 */




export default function Edit({attributes, setAttributes}) {
	var tocItems = attributes.tocContent;
	var title = attributes.ListTitle;
	var CustomTag = attributes.ListType;
	var SelectedHeading = attributes.SelectedHeading;
	var toggleState = attributes.ListToggle;

	const arrayRef = useRef(null);

	const [newTitleADD, setTitleNew] = useState('EXAMPLE ');
	const [newAnchorADD, setAnchorNew] = useState('example-tag');
	const string_to_slug = function (str) {

		str = str.replace(/^\s+|\s+$/g, ''); // trim
		str = str.toLowerCase();

		// remove accents, swap ñ for n, etc
		var from = "àáäâèéëêìíïîòóöôùúüûñçěščřžýúůďťň·/_,:;";
		var to = "aaaaeeeeiiiioooouuuuncescrzyuudtn------";

		for (var i = 0, l = from.length; i < l; i++) {
			str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
		}

		str = str.replace('.', '-') // replace a dot by a dash
			.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
			.replace(/\s+/g, '-') // collapse whitespace and replace by a dash
			.replace(/-+/g, '-') // collapse dashes
			.replace(/\//g, ''); // collapse all forward-slashes

		return str;
	}
	const makeListArray = function (anchor, title) {
		if (anchor == '') {
			anchor = string_to_slug(title)
		}
		return [["anchor", anchor], ['title', title.replaceAll(/<\/?[^>]+(>|$)/gi, "")]];

	}
	const getListItem = (element) => {
		if (element.name === "core/heading") {
			if (SelectedHeading == 'h2') {
				if (element.attributes.level == '2') {
					return makeListArray(element.attributes.anchor, element.attributes.content);
				}
			} else {
				return makeListArray(element.attributes.anchor, element.attributes.content);
			}
		}
		// if (element.name === "acf/faq" || element.name === "acf/how-to") {
		// 	if (element.attributes.data.title != '') {
		// 		return makeListArray('', element.attributes.data.title);
		// 	}
		// }

	};
	const getAllHeadingsRecursive = (contentBlocks = wp.data.select('core/block-editor').getBlocks()) => {
		contentBlocks.forEach((block) => {
			if (block.innerBlocks.length > 0) {
				getAllHeadingsRecursive(block.innerBlocks);
			} else {
				const listItem = getListItem(block);
				if (listItem) {
					tocItems.push(listItem);
				}
			}
		});
	};
	const deleteElement = (index) => {
		tocItems.splice(index, 1);
		setAttributes({tocContent: tocItems.filter(item => Object.keys(item).length !== 0)});
	};

	const changeElement = (element, value)=>{
		attributes.tocContent[element][1][1] = value;
	}

	//добавление нового Элемента
	const AddCustomNew = (title, anchor) => {
		const newArray = [...tocItems];
		newArray.push(makeListArray(title, anchor));
		setAttributes({tocContent: newArray});
	};

	const changePosition = (index, way) => {
		const newArray = [...tocItems];
		if (way === 'up' && index !== 0) {
			[newArray[index], newArray[index - 1]] = [newArray[index - 1], newArray[index]];
		} else if (way === 'down' && index !== newArray.length - 1) {
			[newArray[index], newArray[index + 1]] = [newArray[index + 1], newArray[index]];
		} else {
			console.log('Cannot move element further');
			return;
		}
		setAttributes({tocContent: newArray});
	};

	const BlockControl = () => {
		return (
			<BlockControls>
				<Toolbar>
					<Button
						variant="primary"
						label="Generate"
						onClick={() => {
							tocItems = [];
							getAllHeadingsRecursive();
							//	console.log(tocItems);
							setAttributes({tocContent: tocItems});

						}}>Generate</Button>

					<RadioControl
						selected={CustomTag}
						options={[
							{label: 'ul', value: 'ul'},
							{label: 'ol', value: 'ol'},
						]}

						onChange={(value) => setAttributes({ListType: value})}

					/><ToolbarGroup>
					<RadioControl
						selected={SelectedHeading}
						options={[
							{label: 'h2', value: 'h2'},
							{label: 'all', value: 'all'},
						]}
						onChange={(value) => setAttributes({SelectedHeading: value})}

					/></ToolbarGroup>
					<ToolbarGroup>
						<RadioControl
							selected={
								toggleState ? 'true' : 'false'}
							options={[
								{label: 'Toggle off', value: 'false'},
								{label: 'Toggle on', value: 'true'},
							]}
							onChange={(value) => setAttributes({ListToggle: value == 'true' ? true : false})}

						/>
					</ToolbarGroup>
				</Toolbar>
			</BlockControls>
		);
	};

	const TableRender = () => {



	}
	return (
		<div {...useBlockProps()}>
			<div class="preview-block wp-block-better-toc">
				<div class="preview-block__title">{'Better ToC'}</div>
				<BlockControl/>
				<Panel>
					<PanelBody title="ToC Title" initialOpen={false}>
						<PanelRow>
							<InputControl
								value={title}
								onChange={(nextValue) => setAttributes({ListTitle: nextValue})}
							/>
						</PanelRow>

					</PanelBody>
					<PanelBody ref={arrayRef} title="TOC LIST" initialOpen={true}>
						{tocItems.map((item, index) => {
							return <div >
								<div  gap={2} className={'wp-block-better-toc__grid'}>
									<div style={{display: "flex"}}>
										<p className={'wp-block-better-toc__anchor-class'}>
											{index}
										</p>
									</div>
									<div>
										<InputControl key={index}
													  value={tocItems[index][1][1]}
													  classname={'wp-block-better-toc__grid__text'}
													  onChange={(nextValue) => changeElement(index, nextValue)}
													  //onBlur={(event) => changeElement(index, event.target.value)}
													  //onBlur={console.log('ПОтеря фокуса')}
										/>
									</div>
									<div style={{display: "flex"}}>
										<p className={'wp-block-better-toc__anchor-class'}>
											{"#" + tocItems[index][0][1]}
										</p>

									</div>
									<div style={{display: "flex", alignItems: "center", justifyContent: "center"}}>

										<ButtonGroup>
											<Button isSmall
													icon={chevronUp}
													onClick={() => {
														changePosition(index, 'up');
													}}/>
											<Button isSmall
													icon={chevronDown}
													onClick={() => {
														changePosition(index, 'down');
													}}/>
											<Button isSmall
													icon={trash}
													label="Delete"
													onClick={() => {
														deleteElement(index);
													}
													}/>
										</ButtonGroup>
									</div>
								</div>
							</div>

						})}
					<TableRender/>
						{console.log(arrayRef.current)}
					</PanelBody>
				</Panel>
				<PanelRow>
					<TextControl
						label="New title"
						value={newTitleADD}
						classname={'wp-block-better-toc__grid__text'}
						onChange={(nextValueTitle) => setTitleNew(nextValueTitle)}
					/>
					<TextControl
						label="New Anchor"
						value={newAnchorADD}
						classname={'wp-block-better-toc__grid__text'}
						onChange={(nextValueAnchor) => setAnchorNew(nextValueAnchor)}
					/>
					<Button
						variant="primary"
						label="Add"
						onClick={() => {
							AddCustomNew(newAnchorADD, newTitleADD);
						}}>
						Add</Button>
				</PanelRow>


			</div>
		</div>

	);
}

