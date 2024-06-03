wp.domReady(function() {
    // Set a CSS variable for scrollbar width. This is a workaround for `100vw = 100% + scrollbar width` issue.
    function calculateEditorWidth() {
        let editorWidth = document.querySelector('.edit-post-visual-editor').offsetWidth;
        console.log('Editor width:', editorWidth);
        document.documentElement.style.setProperty('--editor-width', editorWidth + 'px');
    }

    // recalculate on resize
    window.addEventListener('resize', calculateEditorWidth, false);
    // recalculate on dom load
    document.addEventListener('DOMContentLoaded', calculateEditorWidth, false);
    // recalculate on load (assets loaded as well)
    window.addEventListener('load', calculateEditorWidth);

    // Removing the default styles
    wp.blocks.unregisterBlockStyle('core/button', 'fill');
    wp.blocks.unregisterBlockStyle('core/button', 'outline');

    // Registering the new styles.
    // wp.blocks.registerBlockStyle('core/button', [
    // {
    //     name: 'primary',
    //     label: 'Primary',
    //     isDefault: true
    // }
    // ]);
    wp.blocks.registerBlockStyle('core/list', [
        {
            name: 'list-cols-1',
            label: 'Default',
            isDefault: true
        },
        {
            name: 'list-cols-2',
            label: '2 columns'
        },
        {
            name: 'list-cols-3',
            label: '3 columns'
        },
        {
            name: 'list-cols-4',
            label: '4 columns'
        }
    ]);

    wp.blocks.registerBlockVariation(
        'core/media-text',
        {
            name: 'custom-theme-media-text',
            title: 'Custom Media + Content Block',
            attributes: {
                mediaWidth: 35,
                isStackedOnMobile: true,
                className: 'custom-media-text'
            },
            innerBlocks: [
                ['core/heading', { level: 2, placeholder: 'Add Heading...' }],
                ['core/paragraph', { placeholder: 'Add Content...' }],
                ['core/buttons', { layout: { type: 'flex', justifyContent: 'center' } }, [['core/button', { text: 'Button Title' }]]]
            ],
            keywords: ['media', 'content', 'custom', 'theme', 'image'],
            scope: ['inserter', 'transform', 'block'],
            isDefault: false
        }
    );

    wp.blocks.registerBlockVariation(
        'core/media-text',
        {
            name: 'custom-theme-media-text',
            title: 'Custom Media + Content Block',
            attributes: {
                mediaWidth: 35,
                isStackedOnMobile: true,
                className: 'custom-media-text'
            },
            innerBlocks: [
                ['core/heading', { level: 2, placeholder: 'Add Heading...' }],
                ['core/paragraph', { placeholder: 'Add Content...' }],
                ['core/buttons', { layout: { type: 'flex', justifyContent: 'center' } }, [['core/button', { text: 'Button Title' }]]]
            ],
            keywords: ['media', 'content', 'custom', 'theme', 'image'],
            scope: ['inserter', 'transform', 'block'],
            isDefault: false
        }
    );

    wp.blocks.registerBlockVariation(
        'core/image',
        {
            name: 'custom-theme-parallax-image',
            title: 'Parallax Image',
            attributes: {
                align: 'full',
                sizeSlug: 'full',
                className: 'parallax-image'
            },
            keywords: ['parallax', 'image', 'custom', 'theme'],
            scope: ['inserter', 'transform', 'block'],
            isDefault: false
        }
    );
});
