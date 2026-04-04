import { readdir } from 'node:fs/promises';
import { join } from 'node:path';

export async function fetchChangelog(): Promise<string> {
  const res = await fetch('https://raw.githubusercontent.com/julienbourdeau/debugbar/master/CHANGELOG.md');
  return res.text();
}

export async function fetchCurrentVersion(): Promise<string> {
  const res = await fetch('https://rubygems.org/api/v1/versions/debugbar.json');
  const versions = await res.json() as Array<{ number: string; prerelease: boolean }>;
  const current = versions.find((v) => !v.prerelease);
  return current?.number ?? 'unknown';
}

export async function getDebugbarJsFilename(): Promise<string> {
  const dir = join(process.cwd(), 'public/assets/debugbar');
  const files = await readdir(dir);
  const jsFiles = files.filter((f) => f.endsWith('.js') && !f.endsWith('.js.map'));
  if (jsFiles.length !== 1) {
    throw new Error(`Expected exactly 1 debugbar JS file, found ${jsFiles.length}`);
  }
  return jsFiles[0];
}
