import { registerBlockType } from '@wordpress/blocks';
import { TextControl } from '@wordpress/components';
import { useBlockProps } from '@wordpress/block-editor';

registerBlockType('wp-book/book-block', {
    edit({ attributes, setAttributes }) {
        return (
            <div {...useBlockProps()}>
                <TextControl
                    label="Enter Book ID"
                    type="number"
                    value={attributes.bookId}
                    onChange={(val) => setAttributes({ bookId: parseInt(val) })}
                />
            </div>
        );
    },
    save() {
        return null;
    }
});
