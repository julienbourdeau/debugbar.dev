export interface NavItem {
  label: string;
  title?: string;
  url: string;
  external?: boolean;
}

export const navigation: NavItem[] = [
  { label: 'Home', url: '/' },
  { label: 'Docs', title: 'Documentation', url: '/docs' },
  { label: 'Changelog', title: "What's new?", url: '/changelog' },
  { label: 'Updates', title: 'Stay informed', url: '/updates' },
  { label: 'GitHub', url: 'https://github.com/julienbourdeau/debugbar', external: true },
];
