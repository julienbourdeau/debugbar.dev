import { defineCollection, z } from 'astro:content';
import { glob } from 'astro/loaders';

const docs = defineCollection({
  loader: glob({ pattern: '**/*.md', base: './src/content/docs' }),
  schema: z.object({
    slug: z.string(),
    toc_section: z.string(),
    title: z.string(),
    subtitle: z.string().nullish().default(''),
    seo_title: z.string().nullish().default(''),
    seo_description: z.string().nullish().default(''),
    disabled: z.boolean().nullish().default(false),
  }),
});

export const collections = { docs };
