import type { APIRoute, GetStaticPaths } from 'astro';
import { getCollection } from 'astro:content';

export const getStaticPaths: GetStaticPaths = async () => {
  const docs = await getCollection('docs');
  return docs.map((doc) => ({
    params: { slug: doc.data.slug },
    props: { doc },
  }));
};

export const GET: APIRoute = async ({ props }) => {
  const doc = props.doc;
  const markdown = `# ${doc.data.title}\n\n${doc.body!.trim()}\n`;

  return new Response(markdown, {
    headers: { 'Content-Type': 'text/markdown; charset=utf-8' },
  });
};
