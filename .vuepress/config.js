module.exports = {
	title: 'Sculptor - Virtual devops',
	description: 'Sculptor - Virtual devops',

	extraWatchFiles: [
		'**/*.md',
		'.md'
	],

	head: [
		['link', {rel: "stylesheet", type: "text/css", href:"/player/asciinema-player.css"}],
		['script', {src: "/player/asciinema-player.js"}]
	],

	plugins: [
		[
			'vuepress-plugin-clean-urls',
			{
				normalSuffix: '/',
				indexSuffix: '/',
				notFoundPath: '/404.html',
			},
		],

		[['vuepress-plugin-code-copy', true]]
	],

	themeConfig: {

		logo: "/assets/img/statue.svg",
		displayAllHeaders: true,

		nav: [
			{ text: "Home", link: "/" },
			{ text: "About", link: "/about" },
			{ text: "GitHub", link: "https://github.com/sculptor-devops" },
		],

		sidebarDepth: 0,
		sidebar: [
			{
				title: "Getting Started", collapsable: false, children: [
					"introduction",
					"roadmap",					
					"installation",
					"troubleshooting"
				]
			},

			{
				title: "Platform", collapsable: false, children: [
					"compatibility",					
					"software",
					"security"
				]
			},

			{ title: "Advanced", collapsable: true, children: [
				"/advanced/"
			] },
		]
	}
}